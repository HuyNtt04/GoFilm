import 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js';
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.bin').forEach(function(bin){
        bin.addEventListener('click',function(e){
            e.preventDefault();
            const movie = this.getAttribute('data-id');
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
                    axios.post(`/admin/movie/${movie}/xoa`)
                    .then(response => {
                        if (response.data.status === 'success') {
                            let movieElement = document.getElementById(`movie-${movie}`);
                            if (movieElement) { 
                                movieElement.remove();
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
    const softDelete = document.querySelector('#soft-delete');
    const movies = [];
    const checkAll = document.querySelector('.check-all');
    const deleteCheckBox = document.querySelectorAll('.delete-checkbox');
    const checkboxs = document.querySelectorAll('.check-all,.delete-checkbox');
        checkAll.addEventListener('change',function(){
        if(checkAll.checked){
            deleteCheckBox.forEach((checkbox) => {
                movies.push(checkbox.value);
            });
            softDelete.style.opacity = 1;
            softDelete.disabled = false;
        }else {
            deleteCheckBox.forEach((checkbox) => {
                movies.shift(checkbox.value);
            });
            softDelete.style.opacity = 0.5;
            softDelete.disabled = true;
        }
    });
    deleteCheckBox.forEach(checkbox => {
        checkbox.addEventListener('change',function(e){
            if (checkbox.checked) {
                movies.push(checkbox.value);
            } else {
                const index = movies.indexOf(checkbox.value);
                if (index > -1) {
                    movies.splice(index, 1);
                }
            }
            if ( movies.length>0 ){
                softDelete.style.opacity = 1;
            } else {
                softDelete.style.opacity = 0.5;
            }
        })
    })
    // console.log(movies);
    // if (movies.length > 0){
    //     softDelete.style.opacity=1;
    // } else{
    //     softDelete.style.opacity=0.5;
    // }
    softDelete.addEventListener('click',function(e){
        e.preventDefault();

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
                    axios.post(`/admin/movie/del`,{
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
});
