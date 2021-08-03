window.addEventListener('DOMContentLoaded', ()=>{
    // отображение вкладок

    const pageForMe = document.querySelector('.ancets__content-forme'),
          pageMy = document.querySelector('.ancets__content-my'),
          ancetsControlForme = document.querySelector('.ancets-control__forme'),
          ancetsControlMy = document.querySelector('.ancets-control__my');

    function hidden(){
        pageForMe.style.display = 'none';
        pageMy.style.display = 'none';
    }
    hidden();

    function showSection(){
        if (ancetsControlForme.classList.contains('ancets-control-select')){
            pageForMe.style.display = 'block';
        } else{
            pageForMe.style.display = 'none';
        }
        if (ancetsControlMy.classList.contains('ancets-control-select')){
            pageMy.style.display = 'block';
        }else {
            pageMy.style.display = 'none';
        }
    }

    ancetsControlForme.addEventListener('click',()=>{
        ancetsControlForme.classList.add('ancets-control-select');
        ancetsControlMy.classList.remove('ancets-control-select');
        showSection();
    })
    ancetsControlMy.addEventListener('click',()=>{
        ancetsControlMy.classList.add('ancets-control-select');
        ancetsControlForme.classList.remove('ancets-control-select');
        showSection();
    })

    function startShow(){
        ancetsControlForme.classList.add('ancets-control-select');
        showSection();
    }
    startShow();


    // отображение статуса

    const quesListBlockStatus = document.querySelectorAll('.quesList-block__status div');

    quesListBlockStatus.forEach(item=>{
        if (item.classList.contains('quesList-block__status-ok')){
            item.textContent = 'Одобрена';
        }
        if (item.classList.contains('quesList-block__status-wait')){
            item.textContent = 'Ожидаем ответ';
        }
        if (item.classList.contains('quesList-block__status-none')){
            item.textContent = 'Отклонена';
        }
    })


    // отклонить анкету
    const ancetsDecl = document.querySelectorAll('.ancetsDecl');
   
    ancetsDecl.forEach(item =>{
        item.addEventListener('click', (e)=>{
            e.preventDefault();
            alert();

            const request = new XMLHttpRequest();

            request.open('POST', 'vendor/decline.php');
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
            let dataMes = `ancID=${item.id}`;
    
            request.send(dataMes);
            request.addEventListener('load', () => {
             
                if (request.status === 200) {
                    
                    alert();
                } else {
                    alert('Ошибка сервера, повторите попытку позже');
                }
            })

        })
    })
    
})