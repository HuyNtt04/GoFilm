<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\Middleware;

class MovieController extends Controller implements HasMiddleware
{
    public static function middleware():array{
        return [
            new Middleware('permission:delete movie',only:['destroy','bin','hardDelete']),
            new Middleware('permission:restore movie',only:['restoreS','restore']),
            new Middleware('permission:update movie',only:['update','edit']),
            new Middleware('permission:create movie',only:['store','create']),
            new Middleware('permission:view movie',only:['index']),
            new Middleware('permission:duyet movie',only:['duyet']),
            new Middleware('permission:softDelete movie',only:['xoa','softDelete'])

        ];

    }
    public function index(Request $request)
    {
        $is_series = $request->get('is_series',false);
        $query = Movie::where('isDeleted',0);
        if($is_series){
            $query->where('is_series',$is_series);
        }
        $movies = $query->paginate(8);
        return view('admin.movie.index', compact('movies', 'is_series'));
    }
    public function getMovieDetail($id)
{
    $movie = Movie::with('categories')->find($id);
    if (!$movie) {
        return response()->json(['error' => 'Không tìm thấy phim'], 404);
    }
    return response()->json($movie);
}

    public function create()
    {
        $categories = Category::all();
        return view('admin.movie.create',compact('categories'));
    }

    public function store(MovieRequest $movieRequest) 
    {   
        $data = $movieRequest->validated();
        $imageDir = base_path('../public_html/images');
        if ($movieRequest->hasFile('thumbnail')) {
            if (isset($data['thumbnail']) && file_exists($imageDir.$data['thumbnail'])) {
                unlink($imageDir.$data['thumbnail']);
            }
            $imageDir = base_path('../public_html/images');
            $file = $movieRequest->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
        
            $file->move($imageDir, $filename);
        
            $fileUrl = 'images/'. $filename;
        
            $data['thumbnail'] = $fileUrl;
        }
        
        $imagePaths = [];
        if ($movieRequest->hasFile('image')) {
            if (isset($data['image']) && is_array($data['image'])) {
                foreach ($data['image'] as $oldImage) {
                    $oldImagePath = public_path($oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
            foreach ($movieRequest->file('image') as $image) {
                $path = $image->store('uploads/movies', 'public');
                $imagePaths[] = 'storage/'.$path; 
            }
            $data['image']=json_encode($imagePaths);
        }

        $movie = Movie::create($data);
        if ($movieRequest->id_category) {
            $movie->categories()->attach($movieRequest->id_category);
        }
        return redirect()->route('admin.movie.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        $movieCategories = DB::table('category_movie')
                            ->where('category_movie.id_movie',$movie->id)
                            ->pluck('category_movie.id_category','category_movie.id_category')
                            ->all();
        return view('admin.movie.edit', compact('movie','categories','movieCategories'));
    }

    public function update(MovieRequest $movieRequest, Movie $movie)
    {
        
        $data = $movieRequest->validated();
        $imageDir = base_path('../public_html/images');
        if ($movieRequest->hasFile('thumbnail')) {
            if (file_exists($imageDir.$movie->thumbnail)) {
                unlink($imageDir.$movie->thumbnail);
            }
            $file = $movieRequest->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
        
            $file->move($imageDir, $filename);
        
            $fileUrl =  'images/'.$filename;
        
            $data['thumbnail'] = $fileUrl;
        }
        
        $imagePaths = [];
        if ($movieRequest->hasFile('image')) {
            if ($movie->image) {
                $oldImages = json_decode($movie->image);
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path($oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
            foreach ($movieRequest->file('image') as $image) {
                $path = $image->store('uploads/movies', 'public');
                $imagePaths[] = 'storage/'.$path; 
            }
            $data['image']=json_encode($imagePaths);
        }
        if ($movieRequest->id_category) {
            $movie->categories()->sync($movieRequest->id_category);
        }
        $movie->update($data);

        return redirect()->route('admin.movie.index')->with('success', 'Movie updated successfully!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movie.bin')->with('success', 'Movie deleted successfully!');
    }
    public function xoa(Movie $movie){
        if($movie){
            $movie->isDeleted = 1;
            $movie->save();
            return response()->json(['isDeleted' => $movie->isDeleted,'status'=>'success','Phim đã xóa mềm thành công!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Phim không tìm thấy'], 404);
    }
    public function restore(Movie $movie){
        if($movie){
            $movie->isDeleted = 0;
            $movie->save();
            return response()->json(['isDeleted' => $movie->isDeleted,'status'=>'success','Phim đã phục hồi thành công!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Phim không tìm thấy'], 404);
    }
    public function bin(){
        $movies = Movie::where('isDeleted',1)->get();
        return view('admin.movie.bin', compact('movies'));
    }
    public function softDelete(Request $request){
        $movies = $request->movies;
        Movie::whereIn('id',$movies)->update(['isDeleted'=>1]);
        return response()->json(['status' => 'success']);
    }
    public function hardDelete(Request $request){
        $movies = $request->movies;
        Movie::whereIn('id',$movies)->delete();
        return response()->json(['status' => 'success']);
    }
    public function restoreS(Request $request){
        $movies = $request->movies;
        Movie::whereIn('id',$movies)->update(['isDeleted'=>0]);
        return response()->json(['status' => 'success']);
    }
    public function showLinks($id)
    {
    $movie = Movie::findOrFail($id);
    $links = Url::where('Id_Movie', $id)->get();

    return view('admin.movie.links', compact('movie', 'links'));
}
}