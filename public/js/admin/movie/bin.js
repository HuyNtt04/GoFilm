import 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js';
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#delete').addEventListener('click',function(e){
        e.preventDefault();
        const movies = [];
        document.querySelectorAll('.delete-checkbox:checked').forEach(checkbox => {
            movies.push(checkbox.value);
        });
        if(movies.length > 0){
            Swal.fire({
                title: 'Bạn có muốn xóa không ?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/admin/movie/bin/delete`,{
                        movies:movies
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            movies.forEach(movie=>{
                                let movieElement = document.getElementById(`movie-${movie}`);
                                if (movieElement) { 
                                    movieElement.remove();
                                }
                            });
                            Swal.fire(
                                'Đã xóa!',
                                'Dữ liệu đã được xóa.',
                                'success'
                            );
                            document.querySelectorAll('.delete-checkbox').length < 8 && document.querySelector('.pagination') && location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Có vài lỗi!', error);
                        Swal.fire(
                            'Lỗi!',
                            'Đã có lỗi xảy ra khi xóa!',
                            'error'
                        );
                    });
                }
            });
        }else{
            Swal.fire(
                'Yêu cầu',
                'Vui lòng chọn ít nhất 1 phim để xóa!',
                'info'
            );
        }
    });
    document.querySelector('#restore').addEventListener('click',function(e){
        e.preventDefault();
        const movies = [];
        document.querySelectorAll('.delete-checkbox:checked').forEach(checkbox => {
            movies.push(checkbox.value);
        });
        if(movies.length > 0){
            Swal.fire({
                title: 'Bạn có muốn phục hồi không ?',
                text: "Phim sẽ được đưa trở lại danh sách!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Phục hồi!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/admin/movie/bin/restoreS`,{
                        movies:movies
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            movies.forEach(movie=>{
                                let movieElement = document.getElementById(`movie-${movie}`);
                                if (movieElement) { 
                                    movieElement.remove();
                                }
                            })
                            Swal.fire(
                                'Đã phục hồi!',
                                'Phim phục hồi thành công!',
                                'success'
                            );
                            document.querySelectorAll('.delete-checkbox').length < 8 && document.querySelector('.pagination') && location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Có vài lỗi!', error);
                        Swal.fire(
                            'Lỗi!',
                            'Đã có lỗi xảy ra khi phục hồi!',
                            'error'
                        );
                    });
                }
            });
        }else{
            Swal.fire(
                'Yêu cầu',
                'Vui lòng chọn ít nhất 1 phim để phục hồi!',
                'info'
            );
        }
    });
    document.querySelectorAll('.restore').forEach(function(restore){
        restore.addEventListener('click',function(e){
            e.preventDefault();
            const movie = this.getAttribute('data-id');
            Swal.fire({
                title: 'Bạn có muốn phục hồi không ?',
                text: "Phim sẽ được đưa trở lại danh sách!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Phục hồi!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/admin/movie/${movie}/restore`)
                    .then(response => {
                        if (response.data.status === 'success') {
                            let movieElement = document.getElementById(`movie-${movie}`);
                            if (movieElement) { 
                                movieElement.remove();
                            }
                            Swal.fire(
                                'Đã phục hồi!',
                                'Phim phục hồi thành công!',
                                'success'
                            );
                            document.querySelectorAll('.delete-checkbox').length < 8 && document.querySelector('.pagination') && location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Có vài lỗi!', error);
                        Swal.fire(
                            'Lỗi!',
                            'Đã có lỗi xảy ra khi phục hồi!',
                            'error'
                        );
                    });
            }})
            
        });
    });
    document.querySelectorAll('.delete-forever').forEach(e=>{
        e.addEventListener('click',function(){
            var form = this.parentElement;
            Swal.fire({
                title: 'Bạn chắc chắn?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Đã xóa!',
                        'Dữ liệu đã được xóa.',
                        'success'
                    );
                    document.querySelectorAll('.delete-checkbox').length < 8 && document.querySelector('.pagination') && location.reload();
                }
            });
        });
    })
});
