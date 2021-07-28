window.addEventListener('DOMContentLoaded', ()=>{

     


// загрузка фото порфтолио 
const inpAddPic = document.querySelectorAll('.input__add-port-file');
const addPortPic = document.querySelectorAll('.input__add-viepic')
inpAddPic.forEach((item, i) =>{

   
   item.addEventListener('change', () => {
       uploadFilePort(item.files[0], item, i);

   })
})


function uploadFilePort(file, item, i) {
   if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
       alert('Разрешены только изображения');
       item.value = '';
       return;
   }
  
   if (file.size > 2 * 1024 * 1024) {
       alert('Файл должен быть не более 2МБ');
       item.value = '';
       return;
   }

   var reader = new FileReader();
   reader.onload = function (e) {
       addPortPic[i].src = e.target.result;

   }
   reader.onerror = function (e) {
       alert('Ошибка отображения файла')
   }
   reader.readAsDataURL(file);

   document.querySelectorAll('.delitPicPort-btn')[i].style.display = 'flex';
}



// отправка формы добавления портфолио 
const portfolBlock = document.querySelectorAll('.portfol__block');
const portForm = document.querySelector('.portForm');

if (portForm){
portForm.addEventListener('submit', (e) => {
   e.preventDefault();
   if ((inpAddPic[0].value == ''  && inpAddPic[1].value == '' && inpAddPic[2].value == '')){
       alert('Добавьте хотябы одну фотографию!')
   } else {
   const edu = document.querySelectorAll('.edu');

   
   const request = new XMLHttpRequest();
   request.open('POST', 'vendor/addport.php');

   let formData = new FormData(portForm);
    
   inpAddPic.forEach((item, i) =>{
       if (item.value != ''){
           formData.append(`image-${i}`, item.files[0]); 
        }
   })
   
   request.send(formData);
   console.log(formData);
   

   request.addEventListener('load', () => {

       if (request.status === 200) {
           alert('Запись добавлена!');
           if (portfolBlock.length < 4){
               window.location.reload();
           } else{
               window.location.href ='?SeeAllPort';
           }
           
       } else {
           alert('Ошибка сервера, повторите попытку позже');
       }
   })
}
})
}


const addPortBtn = document.querySelector('.portfol__block-add');
const popEduAdd = document.querySelector('.pop-edu__vie-addport');

if (addPortBtn){
    addPortBtn.addEventListener('click', ()=>{
    popEduAdd.style.display = 'flex';
})
}



// открытие записи портфолио

 
const popEduSee = document.querySelector('.pop-edu__vie-see');
      popEduVPic = document.querySelector('.pop-edu__vie-pic img'),
      popEduVControl = document.querySelector('.pop-edu__vie-pic-control'),
      popEduVDesc = document.querySelector('.pop-edu__vie-desc p'),
      popEduVTitle = document.querySelector('.pop-edu__vie-desc h3'),

      

      portfolBlock.forEach(item =>{
          if(!item.classList.contains('portfol__block-add')){
            item.addEventListener('click', (e)=>{
                let target = e.target.parentElement;
                let postContent = target.querySelector('.portfol__block-vh');
                let postContentTitle = target.querySelector('.portfol__block-vh-title');
                let postContentDesc = target.querySelector('.portfol__block-vh-desc');
                
    
    
                popEduVTitle.textContent = postContentTitle.textContent;
                popEduVDesc.textContent = postContentDesc.textContent;
    
                let postContentImg = postContent.querySelectorAll('img');
                postContentImg.forEach(element =>{
                    popEduVPicItem = document.createElement('div');
    
                    popEduVPicItem.classList.add('pop-edu__vie-pic-item');
                    popEduVPicItem.innerHTML = `<img class="portContPic" src="${element.src}" alt="">`;
                    popEduVControl.append(popEduVPicItem);
    
                })
                
                const idPortItem = target.querySelector('.idPortItem').textContent;
                const popEduVEditBtn = document.querySelector('.pop-edu__vie-edit');


                if (popEduVEditBtn){popEduVEditBtn.href = `?editportitem=${idPortItem}`;}
                



                const editPortFormId = document.querySelector('.editPortFormId');
                // editPortFormId.value = idPortItem;
                console.log(editPortFormId)

                selectFirst();
                popEduVControl.addEventListener('click', (e)=>{
                    console.log(e.target);
                    if (e.target.classList.contains('portContPic')){
                        popEduVPic.src = e.target.src;
                        document.querySelectorAll('.pop-edu__vie-pic-item-active').forEach(el =>{
                            el.classList.remove('pop-edu__vie-pic-item-active');
                        })
                        e.target.parentElement.classList.add('pop-edu__vie-pic-item-active');
                    }
                })
                popEduSee.style.display = 'flex';
            })
          }
        
      })
      
      // вывод первого фото на главный экран

      function selectFirst(){
        const firstImg = popEduVControl.firstChild;
       firstImg.classList.add('pop-edu__vie-pic-item-active');
        popEduVPic.src = firstImg.firstChild.src;
      }

           // закрытие попап партфолио

     const popupPort = document.querySelectorAll('.pop-edu__vie-wrap'),
     popupPortExit = document.querySelectorAll(".pop-edu__vie-exit");

     popupPortExit.forEach(item =>{
         item.addEventListener('click', ()=>{
           popupPort.forEach(element =>{
                element.style.display = 'none';
                popEduVControl.innerHTML = '';
           })
          
     })
     })


     // удаление фото из инпута
     const delitPicPortBtn = document.querySelectorAll('.delitPicPort-btn');

     delitPicPortBtn.forEach(item =>{
         item.addEventListener('click', ()=>{
            item.parentElement.querySelector('.input__add-port-file').value = '';
            item.parentElement.querySelector('img').src = '';
            item.style.display ='none';
         })
     })


     // убрать гет запрос по закрытию редактирования

     const ExitEditPortItem = document.querySelector('.pop-edu__vie-exit-editport');

     
     if (ExitEditPortItem !== null){
        ExitEditPortItem.addEventListener('click', ()=>{
            document.location.href = 'profil.php';
        })
     }

     // отправка формы изменения
const isDeliteAll = document.querySelectorAll('.isDelite');
const editPortForm = document.querySelector('.editPortForm');
if (editPortForm){
editPortForm.addEventListener('submit', (e) => {
   e.preventDefault();
   if ((inpAddPic[3].value == ''  && inpAddPic[4].value == '' && inpAddPic[4].value == '') &&
   (isDeliteAll[0].value == '1' && isDeliteAll[1].value == '1' && isDeliteAll[2].value == '1' )){
       alert('Добавьте хотябы одну фотографию!')
   } else {
   const edu = document.querySelectorAll('.edu');

   
   const request = new XMLHttpRequest();
   request.open('POST', 'vendor/editPort.php');

   let formData = new FormData(editPortForm);
    
   inpAddPic.forEach((item, i) =>{
       if (item.value != ''){
           formData.append(`image-${i}`, item.files[0]); 
        }
   })
   
   request.send(formData);
   console.log(formData);
   

   request.addEventListener('load', () => {

       if (request.status === 200) {
           alert('Запись добавлена!');
           window.location.reload();
       } else {
           alert('Ошибка сервера, повторите попытку позже');
       }
   })
}
})

// удаление фотографий при редактировании

const delitPortBtnEdit = document.querySelectorAll('.delitPicPort-btnEdit');


delitPortBtnEdit.forEach(item =>{
    item.addEventListener('click', ()=>{
        item.parentElement.querySelector('.isDelite').value = '1';

    })
})



// удаление записи 

const portItemEditDelite = document.querySelector('.portItemEditDelite');

if (portItemEditDelite) {
    portItemEditDelite.addEventListener('click', ()=>{
        if(confirm('Вы уверены, что хотите удалить эту запись?')){
            const request = new XMLHttpRequest();
            request.open('POST', 'vendor/delitePort.php');
            
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            const editPortId = document.querySelector('.editPortFormId').value;
            let editPortIdData = `id_del=${editPortId}`;
            request.send(editPortIdData);

            
         
            request.addEventListener('load', () => {
         
                if (request.status === 200) {
                    alert('Запись удалена!');
                    document.location.href = 'profil.php';
                } else {
                    alert('Ошибка сервера, повторите попытку позже');
                }
            })
        }
    })
}
}
})

