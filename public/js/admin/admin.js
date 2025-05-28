document.addEventListener('DOMContentLoaded',function(){
const checkAll = document.querySelectorAll('.check-all');
const thumbnail = document.querySelector('#thumbnail');
const images = document.querySelector('#images');
    checkAll.forEach((e)=>{
        e.addEventListener('click',function(){
            document.querySelectorAll('.delete-checkbox').forEach( cb =>{
                if(e.checked==true){
                    cb.checked=true
                }else{
                    cb.checked=false
                }
            })
        })
    });
    thumbnail.addEventListener('change', function(event) {
    
      const files = event.target.files;
      const container = document.getElementById('thumbnail_preview');
      container.innerHTML = ''; // Xóa các hình ảnh cũ trong container
    
      // Duyệt qua tất cả các file được chọn
      for (let i = 0; i < files.length; i++) {
          const file = files[i];
          
          if (file.type.startsWith('image/')) {
              const objectURL = URL.createObjectURL(file);
    
              const img = document.createElement('img');
              img.src = objectURL;
              img.alt = file.name;
              img.style.maxWidth = '200px'; // Chỉ định kích thước tối đa nếu cần
              img.style.margin = '10px';
    
              container.appendChild(img);
          }
      }
    });
    images.addEventListener('change', function(event) {
        const files = event.target.files;
        const container = document.getElementById('image_preview');
        container.innerHTML = ''; // Xóa các hình ảnh cũ trong container
      
        // Duyệt qua tất cả các file được chọn
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            if (file.type.startsWith('image/')) {
                const objectURL = URL.createObjectURL(file);
      
                const img = document.createElement('img');
                img.src = objectURL;
                img.alt = file.name;
                img.style.maxWidth = '200px'; // Chỉ định kích thước tối đa nếu cần
                img.style.margin = '10px';
      
                container.appendChild(img);
                }
            }
        });
        
});    