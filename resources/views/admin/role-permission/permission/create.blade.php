@extends('layouts.admin')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Permission
                        <a href="{{url('admin/permissions')}}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form id="permissionForm" data-parsley-validate action="{{url('admin/permissions')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" class="form-control"
                                required
                                data-parsley-required-message="Tên quyền không được bỏ trống"
                                data-parsley-trigger="change"
                                data-parsley-unique
                                data-parsley-error-message="This field is required and must be unique."
                            />
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    $('#permissionForm').parsley();

    window.Parsley.addValidator('unique', {
        validateString: function(value, field) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '{{ route("admin.permissions.check-unique") }}',
                    method: 'POST',
                    data: {
                        name: value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.isUnique) {
                            resolve();
                        } else {
                            reject('Quyền lợi đã có!');
                        }
                    },
                    error: function() {
                        reject('Error checking uniqueness.');
                    }
                });
            });
        },
        priority: 32
    });
});
</script>
@endpush
@endsection