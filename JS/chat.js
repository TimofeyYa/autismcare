window.addEventListener('DOMContentLoaded', ()=>{
    // увеличение textarea
    const chatTextarea = document.querySelector('.messager__control-textarea');
    const messagerControlContent = document.querySelector('.messager__control-content');


    chatTextarea.addEventListener('input',()=>{
        if (chatTextarea.scrollTop > 10){
            chatTextarea.style.height = '200px';
            messagerControlContent.style.height = '200px';
            
        } 
       
    })
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
                    window.location.reload();
                } else {
                    alert('Ошибка сервера, повторите попытку позже');
                }
            })
        }
        


    })

    // проверка наличия сообщений 

    setInterval(()=>{
        
    }, 200)
})