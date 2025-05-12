@extends('layouts.admin')
@section('content')
@push('css')
<style>
.recentOrders {
    position: relative;
    display: grid;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    border-radius: 20px;
}

.cardHeader {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.cardHeader h2 {
    font-weight: 600;
    color: var(--blue);
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table thead td {
    font-weight: 600;
}

.recentOrders table tr {
    text-align: center;
    color: var(--black1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.recentOrders table tbody tr:hover {
    background: var(--blue);
    color: var(--white);
}

.recentOrders table tr td {
    padding: 10px;
}

.btn-add,
.btn-edit,
.btn-delete,
.btn-detail {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: 0.3s;
}

.btn-add {
    background: var(--blue);
    color: var(--white);
}

.btn-add:hover {
    scale: 1.1;
}

.btn-detail {
    background: #ffa500;
    color: white;
}

.btn-detail:hover {
    background: #cc8400;
}

.btn-edit {
    background: #1795ce;
    color: var(--white);
}

.btn-edit:hover {
    background: #0f7ab9;
}

.btn-delete {
    background: #f00;
    color: var(--white);
    border: none;
    cursor: pointer;
}

.btn-delete:hover {
    background: #d90000;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 600px;
    position: relative;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
}

.close-modal {
    cursor: pointer;
    font-size: 25px;
    font-weight: bold;
}
</style>
@endpush
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Người Dùng</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Users</h2>
        <a href="{{url('admin/users/create')}}" class="btn-add">Thêm Người Dùng</a>
        <button class="btn-delete" id="delete-users">Xóa</button>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <label class="container">
                        <input type="checkbox" class="check-all">
                        <div class="checkmark"></div>
                    </label>
                </th>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $user )
            <tr id="user-{{ $user->id }}">
                <td>
                    <label class="container">
                        <input type="checkbox" class="delete-checkbox" value="{{ $user->id }}">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach ( $user->getRoleNames() as $rolename)
                    <label class="badge bg-primary mx-1">{{$rolename}}</label>
                    @endforeach
                    @endif
                </td>
                <td>
                    @can('update user')
                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn-edit">Edit</a>
                    @endcan
                    @can('delete user')
                    <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-delete delete-user">Delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="links">{{ $users->onEachSide(1)->links() }}</div>

</div>
@push('scripts')
<script type="module" src="{{ asset('js/admin/users/delete.js') }}"></script>
<script type="module" src="{{ asset('js/admin/admin.js') }}"></script>
@endpush
@endsection