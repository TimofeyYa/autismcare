window.addEventListener('DOMContentLoaded', ()=>{
    const quesSeeSelector = document.querySelector('.ques-see__selector'),
    quesSeeStatus = document.querySelector('.ques-see__status');

    checkStatus();

    quesSeeSelector.addEventListener('click', ()=>{
        if (quesSeeStatus.classList.contains('ques-see__status-no')){
            quesSeeStatus.classList.remove('ques-see__status-no');
            quesSeeStatus.classList.add('ques-see__status-yes');
            setTimeout(()=>{
                checkStatus();
             }, 200)
        } else{
            quesSeeStatus.classList.remove('ques-see__status-yes');
            quesSeeStatus.classList.add('ques-see__status-no');
            setTimeout(()=>{
                checkStatus();
            }, 200)
            
        }
    })

    function checkStatus(){
        if (quesSeeStatus.classList.contains('ques-see__status-no')){
            quesSeeStatus.textContent = 'Нет'; 
        }
        if (quesSeeStatus.classList.contains('ques-see__status-yes')){
            quesSeeStatus.textContent = 'Да'; 
        }
    }


    // закрытие попап окна 

    const questExit = document.querySelector('.popup__quest-exit');
    const popupQuest = document.querySelector('.popup-quest');
    questExit.addEventListener('click', ()=>{
        popupQuest.style.display = 'none';
    })

    //открытие попап окна 

    const questBtnSee = document.querySelector('.quest-see__btn .main-btn__gra');

    questBtnSee.addEventListener('click', ()=>{
        popupQuest.style.display = 'flex';
    })

    // отправка попапа

    const popupQuestForm = document.querySelector('.popup-quest__form');

    popupQuestForm.addEventListener('submit', (e)=>{
        e.preventDefault();
        let request = new XMLHttpRequest();

        request.open('POST', 'vendor/quest.php');

        const formData = new FormData(popupQuestForm);

        request.send(formData);
        request.addEventListener('load', () => {
         
            if (request.status === 200) {
                alert('Анкета обновлена');
                // document.location.href = 'profil.php';
            } else {
                alert('Ошибка сервера, повторите попытку позже');
            }
        })
    })

    // выбор ребёнка

    const popupQuestKidsBlock = document.querySelectorAll('.popup__quest-kids-block');

    popupQuestKidsBlock.forEach(item =>{
        item.addEventListener('click', ()=>{
            if (item.classList.contains('popup__quest-block-select')){
                item.classList.remove('popup__quest-block-select');
                revers(item, 'yes');
            } else{
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

    // Смена статуса поиска
    quesSeeSelector.addEventListener('click', ()=>{
        const request = new XMLHttpRequest();
        let status = '';


        request.open('POST', 'vendor/questSelectStatus.php');
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        if (quesSeeStatus.classList.contains('ques-see__status-no')){
            status = 'status=no';
        }
        if (quesSeeStatus.classList.contains('ques-see__status-yes')){
            status = 'status=yes';
        }


        request.send(status);
        request.addEventListener('load', () => {
         
            if (request.status === 200) {

            } else {
                alert('Ошибка сервера, повторите попытку позже');
            }
        })
    })

    // отправка анкеты

    const sendAncBtn = document.querySelector('.quesList-block__btns button');
    const ancId =document.querySelector('.myAncID').value;
    const recipientNum = document.querySelector('.recipientNum').value;

     sendAncBtn.addEventListener('click',sencAnc)

    function sencAnc(){
        const request = new XMLHttpRequest();

        request.open('POST', 'vendor/addAncets.php');
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        let dataMes = `ancID=${ancId}&recNum=${recipientNum}`;

        request.send(dataMes);
        request.addEventListener('load', () => {
         
            if (request.status === 200) {
                sendAncBtn.textContent = "Запись отправлена";
                sendAncBtn.removeEventListener('click', sencAnc);
            } else {
                alert('Ошибка сервера, повторите попытку позже');
            }
        })
    }
})