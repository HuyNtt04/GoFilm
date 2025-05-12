import 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js';
document.addEventListener('DOMContentLoaded',function(){
    document.querySelectorAll('.delete-ep').forEach(e=>{
        e.addEventListener('click',function(){
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
                    document.querySelectorAll('.delete-checkbox').length < 8 && document.querySelector('.pagination') && location.reload();
                }
            });
        });

    })
    document.querySelector('#delete-eps').addEventListener('click',function(e){
        e.preventDefault();
        const episodes = [];
        document.querySelectorAll('.delete-checkbox:checked').forEach(checkbox => {
            episodes.push(checkbox.value);
        });
        if(episodes.length > 0){
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
                    axios.post(`/admin/tvseries/{movie}/episodes/delete`,{
                        episodes:episodes
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            episodes.forEach(episode=>{
                                let episodeElement = document.getElementById(`episode-${episode}`);
                                console.log(episodeElement);
                                if (episodeElement) { 
                                    episodeElement.remove();
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
                'Vui lòng chọn ít nhất 1 Tập để xóa!',
                'info'
            );
        }
    });
})