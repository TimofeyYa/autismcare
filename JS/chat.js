window.addEventListener('DOMContentLoaded', ()=>{
    // увеличение textarea
    const chatTextarea = document.querySelector('.messager__control-textarea');
    const messagerControlContent = document.querySelector('.messager__control-content');

    if (chatTextarea){
       chatTextarea.addEventListener('input',()=>{
        if (chatTextarea.scrollTop > 10){
            chatTextarea.style.height = '200px';
            messagerControlContent.style.height = '200px';
            
        } 
       
    }) 
    }
    if (chatTextarea){
    // отправка сообщения
    const messager = document.querySelector('.messager');
    const messId = document.querySelector('.messId').value;
    const sendMessageBtn = document.querySelector('.messager__control-send');
    sendMessageBtn.addEventListener('click', ()=>{
        if (chatTextarea.value.length > 0 && chatTextarea.value != ' '){

            let dataMes =`message=${chatTextarea.value}&chatid=${chatTextarea.name}&messid=${messId}`;
            const request = new XMLHttpRequest();
            request.open('POST', 'vendor/sendMessage.php');
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(dataMes);

            
         
            request.addEventListener('load', () => {
         
                if (request.status === 200) {
                    
                    chatTextarea.value='';
                    // window.location.reload();
                } else {
                    alert('Ошибка сервера, повторите попытку позже');
                }
            })
        }
        


    })

    // прокрутка

    const block = document.querySelector('.messager__chat');
    block.scrollTop = block.scrollHeight;


    // Добавим анкету и услугу 

    const AddItemBtn = document.querySelectorAll('.messager-full__add button');
    const addAncet = document.querySelector('.addAncet');
    const ancetInfo = document.querySelector('#ancetInfo');

    if (addAncet){
    addAncet.addEventListener('click', ()=>{
        addAncet.classList.toggle('mesBtnSelect');
        if (addAncet.classList.contains('mesBtnSelect')){
            ancetInfo.value = addAncet.id;
        } else {
            ancetInfo.value ='';
        }
    })
    }
    // if (AddItemBtn){
    // AddItemBtn.forEach(item =>{
    //     item.addEventListener('click', ()=>{
    //         item.classList.toggle('mesBtnSelect');
    //     })
    // })
// }

    // Отображение предложения услуги
}
    const once = document.querySelector('#once'),
          week = document.querySelector('#week'),
          formOnce = document.querySelector('.popup__service-formOnce'),
          formWeek = document.querySelector('.popup__service-formEvryWeek'),
          select = document.querySelector('.popup__service-formMidle select'),
          timeInp = document.querySelectorAll('.popup__service-formEvryWeek input[type="time"]');

          console.log(timeInp);
          timeInp.forEach(item =>{
              item.value = '';
          })

          timeInp.forEach(item =>{
              item.addEventListener('input', ()=>{
                  if (item != ''){
                    item.parentElement.classList.add('popup__service-weekDay-active');
                  }
              })
          })
    

    function showType(i){
        formOnce.style.display = 'none';
        formWeek.style.display = 'none';
        if (i == 1){
            formOnce.style.display = 'block';
        }
        if (i == 2){
            formWeek.style.display = 'flex';
        }
    }
    showType(1);

    select.addEventListener('click', ()=>{
        showType(select.value);
    })
    

    const popup__serviceExit = document.querySelector('.popup__service-exit');
    const popup__serviceWrap = document.querySelector('.popup__service-wrap');
    const addServise = document.querySelector('#addServise');
    const serviceInfo = document.querySelector('#serviceInfo');

    popup__serviceExit.addEventListener('click', ()=>{
        popup__serviceWrap.style.display = 'none';
    })
    addServise.addEventListener("click", ()=>{
        popup__serviceWrap.style.display = 'flex';
    })
    
    function isService(){
        if (serviceInfo.value != ''){
            addServise.classList.add('mesBtnSelect');
        } else {
            addServise.classList.remove('mesBtnSelect');
        }
    }
    isService();


    // ребёнок
    const popupQuestKidsBlock = document.querySelectorAll('.popup__quest-kids-block');

    popupQuestKidsBlock.forEach(item =>{
        item.addEventListener('click', ()=>{
            if (item.classList.contains('popup__quest-block-select')){
                item.classList.remove('popup__quest-block-select');
                revers(item, 'yes');
            } else{
                popupQuestKidsBlock.forEach(elem =>{
                    elem.classList.remove('popup__quest-block-select');
                    revers(elem, 'yes');
                })
                item.classList.add('popup__quest-block-select');
                revers(item, 'no');
            }
        })
    })

    function revers(item, remove){
        const inp = item.querySelector('.questHiddenInp');
        const idEl = item.querySelector('.popup__quest-kids-id').textContent;
        if (remove == 'no'){
            inp.value = idEl;
        } else if(remove == 'yes'){
            inp.value = '';
        }
        
    }

    function ifClassContains(){
        popupQuestKidsBlock.forEach(item =>{
            if (item.classList.contains('popup__quest-block-select')){
                revers(item, 'no');
            }
        })
    }
    ifClassContains();

    // создание услуги 

    const serviceForm = document.querySelector('.popup__service-form form');
    const  serviceId = document.querySelector('#serviceId');

    serviceForm.addEventListener('submit', (e)=>{
        e.preventDefault();

        const request = new XMLHttpRequest();
        request.open('POST', 'vendor/addService.php');

        let formData = new FormData(serviceForm);
        request.send(formData);

        

        request.addEventListener('load', () => {

            if (request.status === 200) {
                serviceInfo.value = serviceId.value;
                popup__serviceWrap.style.display = 'none';
                if (serviceInfo.value != ''){
                    addServise.classList.add('mesBtnSelect');
                } else {
                    addServise.classList.remove('mesBtnSelect');
                }
            } else {
                alert('Ошибка сервера, повторите попытку позже');
            }
        })
    })
})