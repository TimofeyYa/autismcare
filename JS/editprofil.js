window.addEventListener('DOMContentLoaded', ()=>{
        // работа с файлом
        const editAvatar = document.querySelector('.edit-avatar'),
        filePreview = document.querySelector('.file__preview');
    editAvatar.addEventListener('change', () => {
        uploadFile(editAvatar.files[0]);

    })

    function uploadFile(file) {
        if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
            alert('Разрешены только изображения');
            editAvatar.value = '';
            return;
        }
        
        if (file.size > 2 * 1024 * 1024) {
            alert('Файл должен быть не более 2МБ');
            editAvatar.value = '';
            return;
        }

        var reader = new FileReader();
        reader.onload = function (e) {
            
            filePreview.innerHTML = `<img src="${e.target.result}" alt='фото'>`;

        }
        reader.onerror = function (e) {
            alert('Ошибка отображения файла')
        }
        reader.readAsDataURL(file);
    }
    
    // отправка формы редактирования

    const editForm = document.querySelector('.edit-form');


    editForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const edu = document.querySelectorAll('.edu');
        const eduObj = {};
        edu.forEach((item, i)=>{
            eduObj[i] = item.value
        })
        
        const request = new XMLHttpRequest();
        request.open('POST', 'vendor/editprofil.php');

        let formData = new FormData(editForm);
        // formData.append('edu', eduObj);
        if (editAvatar.value != ''){
           formData.append('image', editAvatar.files[0]); 
        }
        request.send(formData);
        console.log(formData);
        

        request.addEventListener('load', () => {

            if (request.status === 200) {
                alert('Данные успешно изменены');
                window.location.reload();
            } else {
                alert('Ошибка сервера, повторите попытку позже');
            }
        })
    })

    // появление форм добавления образования

    const editEduAdd = document.querySelector('.edit-edu__add button'),
        eduAreadivMax = document.createElement('div');

    let colAreaEdu = 1;

    eduAreadivMax.innerHTML = '<p>Можно добавить не более 5 мест обучения</p>';

    const addEdu = editEduAdd.addEventListener('click', () => {
        colAreaEdu++;

        if (colAreaEdu < 11) {
            showEduArea();
        }

    })

    function showEduArea() {
        const eduBlock = document.querySelector('.edu__block'),
            eduAreadiv = document.createElement('div'),
            eduAreadivMax = document.createElement('div');
        let eduNumber = document.querySelectorAll('.edu-number').length + 1;
        let i = eduNumber;
        
        if (i <= 10){
            eduAreadiv.innerHTML = `<div class="edu-block"><textarea name="edu-${i}" class="edu edu-textarea"  id="" cols="30" rows="10"></textarea>
                <div class="edu-number">${i}</div></div>`;
            eduBlock.append(eduAreadiv);
        } else if(i === 11) {
            eduAreadiv.innerHTML = `Максимальное колличество 10`;
            eduBlock.append(eduAreadiv);
        }
            
        


    }
})