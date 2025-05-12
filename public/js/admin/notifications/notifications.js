import 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js';
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.bin-noti').forEach(function(bin){
        bin.addEventListener('click',function(e){
            e.preventDefault();
            const notification = this.getAttribute('data-id');
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
                    axios.post(`/admin/notification/${notification}/xoa`)
                    .then(response => {
                        if (response.data.status === 'success') {
                            let notificationElement = document.getElementById(`notification-${notification}`);
                            if (notificationElement) { 
                                notificationElement.remove();
                            }
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
        });
    });
    const softDelete = document.querySelector('#soft-delete-noti');
    const notifications = [];
    const checkAll = document.querySelector('.check-all');
    const deleteCheckBox = document.querySelectorAll('.delete-checkbox');
    const checkboxs = document.querySelectorAll('.check-all,.delete-checkbox');
        checkAll.addEventListener('change',function(){
        if(checkAll.checked){
            deleteCheckBox.forEach((checkbox) => {
                notifications.push(checkbox.value);
            });
            softDelete.style.opacity = 1;
            softDelete.disabled = false;
        }else {
            deleteCheckBox.forEach((checkbox) => {
                notifications.shift(checkbox.value);
            });
            softDelete.style.opacity = 0.5;
            softDelete.disabled = true;
        }
    });
    deleteCheckBox.forEach(checkbox => {
        checkbox.addEventListener('change',function(e){
            if (checkbox.checked) {
                notifications.push(checkbox.value);
            } else {
                const index = notifications.indexOf(checkbox.value);
                if (index > -1) {
                    notifications.splice(index, 1);
                }
            }
            if ( notifications.length>0 ){
                softDelete.style.opacity = 1;
            } else {
                softDelete.style.opacity = 0.5;
            }
        })
    })
    // console.log(notifications);
    // if (notifications.length > 0){
    //     softDelete.style.opacity=1;
    // } else{
    //     softDelete.style.opacity=0.5;
    // }
    softDelete.addEventListener('click',function(e){
        e.preventDefault();

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
                    axios.post(`/admin/notification/del`,{
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
});
