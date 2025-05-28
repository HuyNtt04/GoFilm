document.addEventListener('DOMContentLoaded',function(){
    document.querySelector('#delete-subsplan').addEventListener('click',function(){
        var form = this.parentElement;
        Swal.fire({
            title: 'Bạn chắc chắn?',
            text: "Hành động này không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa!',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                    'Đã xóa!',
                    'Dữ liệu đã được xóa.',
                    'success'
                );
            }
        });
    });
    document.querySelector('#delete-subsplans').addEventListener('click',function(e){
        e.preventDefault();
        const subscriptionsplans = [];
        document.querySelectorAll('.delete-checkbox:checked').forEach(checkbox => {
            subscriptionsplans.push(checkbox.value);
        });
        if(subscriptionsplans.length > 0){
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
                    axios.post(`/admin/subscriptionsplans/delete`,{
                        subscriptionsplans:subscriptionsplans
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            subscriptionsplans.forEach(subscriptionsplan=>{
                                let subscriptionsplanElement = document.getElementById(`subsplan-${subscriptionsplan}`);
                                console.log(subscriptionsplanElement);
                                if (subscriptionsplanElement) { 
                                    subscriptionsplanElement.remove();
                                }
                            });
                            Swal.fire(
                                'Đã xóa!',
                                'Dữ liệu đã được xóa.',
                                'success'
                            );
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
                'Vui lòng chọn ít nhất 1 Gói để xóa!',
                'info'
            );
        }
    });
})