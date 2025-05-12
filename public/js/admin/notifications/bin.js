import 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js';
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#delete-noti').addEventListener('click',function(e){
        e.preventDefault();
        const notifications = [];
        document.querySelectorAll('.delete-checkbox:checked').forEach(checkbox => {
            notifications.push(checkbox.value);
        });
        if(notifications.length > 0){
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
                    axios.post(`/admin/notification/bin/delete`,{
                        notifications:notifications
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            notifications.forEach(notification=>{
                                let notificationElement = document.getElementById(`notification-${notification}`);
                                if (notificationElement) { 
                                    notificationElement.remove();
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
                'Vui lòng chọn ít nhất 1 thông báo để xóa!',
                'info'
            );
        }
    });
    document.querySelector('#restore-noti').addEventListener('click',function(e){
        e.preventDefault();
        const notifications = [];
        document.querySelectorAll('.delete-checkbox:checked').forEach(checkbox => {
            notifications.push(checkbox.value);
        });
        if(notifications.length > 0){
            Swal.fire({
                title: 'Bạn có muốn phục hồi không ?',
                text: "Thông báo sẽ được đưa trở lại danh sách!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Phục hồi!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/admin/notification/bin/restoreS`,{
                        notifications:notifications
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            notifications.forEach(notification=>{
                                let notificationElement = document.getElementById(`notification-${notification}`);
                                if (notificationElement) { 
                                    notificationElement.remove();
                                }
                            })
                            Swal.fire(
                                'Đã phục hồi!',
                                'Thông báo phục hồi thành công!',
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
                'Vui lòng chọn ít nhất 1 thông báo để phục hồi!',
                'info'
            );
        }
    });
    document.querySelectorAll('.restore-noti').forEach(function(restore){
        restore.addEventListener('click',function(e){
            e.preventDefault();
            const notification = this.getAttribute('data-id');
            Swal.fire({
                title: 'Bạn có muốn phục hồi không ?',
                text: "Thông báo sẽ được đưa trở lại danh sách!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Phục hồi!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/admin/notification/${notification}/restore`)
                    .then(response => {
                        if (response.data.status === 'success') {
                            let notificationElement = document.getElementById(`notification-${notification}`);
                            if (notificationElement) { 
                                notificationElement.remove();
                            }
                            Swal.fire(
                                'Đã phục hồi!',
                                'Thông báo phục hồi thành công!',
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
    document.querySelectorAll('.delete-forever-noti').forEach(e=>{
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
