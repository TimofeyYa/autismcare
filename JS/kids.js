window.addEventListener('DOMContentLoaded', ()=>{




$.fn.setCursorPosition = function(pos) {
    if ($(this).get(0).setSelectionRange) {
      $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
      var range = $(this).get(0).createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  };

$("#oldKid").mask("99 Лет",{
    placeholder:" ",
    autoclear: false});



    // Закрытие попапа

    const addKidExit = document.querySelector('.add-kid-exit');
    const popupAddKid = document.querySelector('.popup__add-kid')

    if (addKidExit){
        
        addKidExit.addEventListener('click', ()=>{
            window.location.href = 'profil.php';
        })
    }


    // Документ загружен

    const addKidFormFile = document.querySelector('.add-kid__form-file');
    const fileSvg = document.querySelector('.add-kid__form-doc svg');

    if (addKidFormFile){
        addKidFormFile.addEventListener('change', ()=>{
            if (addKidFormFile != ''){
                
                uploadFileKid(addKidFormFile.files[0], addKidFormFile)
            }
        })
    }

    function uploadFileKid(file, item) {
        
        if (!['application/zip', 'application/x-zip-compressed', 'application/x-rar-compressed', 'application/pdf'].includes(file.type)) {
            alert('Разрешены архивы (ZIP, RAR) и PDF файлы');
            item.value = '';
            fileSvg.style.opacity = 0.55;
            return;
        }
       
        if (file.size > 20 * 1024 * 1024) {
            alert('Файл должен быть не более 20МБ');
            item.value = '';
            
            return;
        }
     
        fileSvg.style.opacity = 1;
     }

     if (addKidFormFile.value !=''){
         fileSvg.style.opacity = 1;
     }
     // Отправить форму в БД
        const addKidForm = document.querySelector('.add-kid__form');

        if (addKidForm){
            addKidForm.addEventListener('submit', (e) => {
                e.preventDefault();
        
             
                
                const request = new XMLHttpRequest();
                request.open('POST', 'vendor/addKid.php');
             
                let formData = new FormData(addKidForm);
                 
                formData.append('Doc', addKidFormFile.files[0]);
                
                request.send(formData);
                console.log(formData);
                
             
                request.addEventListener('load', () => {
             
                    if (request.status === 200) {
                        alert('Запись добавлена!');
                            // window.location.reload();
                    
                        
                    } else {
                        alert('Ошибка сервера, повторите попытку позже');
                    }
                })
        
             })
        }



     // Отправить форму в БД
     const editKidForm = document.querySelector('.eidt-kid__form');


     editKidForm.addEventListener('submit', (e) => {
     e.preventDefault();

       
  
     
     const request = new XMLHttpRequest();
     request.open('POST', 'vendor/editKid.php');
  
     let formData = new FormData(editKidForm);
      
     formData.append('Doc', addKidFormFile.files[0]);
     
     request.send(formData);
     console.log(formData);
     
  
     request.addEventListener('load', () => {
  
         if (request.status === 200) {
             alert('Запись добавлена!');
                 // window.location.reload();
         
             
         } else {
             alert('Ошибка сервера, повторите попытку позже');
         }
     })

  })

  // удаление записи 

const kidItemEditDelite = document.querySelector('.kidItemEditDelite');

if (kidItemEditDelite) {
    kidItemEditDelite.addEventListener('click', ()=>{
        if(confirm('Вы уверены, что хотите удалить эту запись?')){
            const request = new XMLHttpRequest();
            request.open('POST', 'vendor/deliteKid.php');
            
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            const editPortId = document.querySelector('.editKidId').value;
            let editPortIdData = `id_del=${editPortId}`;
            request.send(editPortIdData);

            
         
            request.addEventListener('load', () => {
         
                if (request.status === 200) {
                    alert('Запись удалена!');
                    // document.location.href = 'profil.php';
                } else {
                    alert('Ошибка сервера, повторите попытку позже');
                }
            })
        }
    })
}

})