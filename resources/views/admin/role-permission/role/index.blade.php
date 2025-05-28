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
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Roles</h2>
        <a href="{{url('admin/roles/create')}}" class="btn-add">Thêm Role</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $roles as $role )
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    <a href="{{url('admin/roles/'.$role->id.'/give-permissions')}}" class="btn-edit">Thêm / Sửa Quyền
                        Lợi Role</a>
                    @can('update role')
                    <a href="{{url('admin/roles/'.$role->id.'/edit')}}" class="btn-edit">Sửa</a>
                    @endcan
                    @can('delete role')
                    <form action="{{url('admin/roles/'.$role->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete">Xóa</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
            {{ $roles->links() }}
        </tbody>
    </table>
    <div class="links">{{ $roles->onEachSide(1)->links() }}</div>

</div>
@endsection