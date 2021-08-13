window.addEventListener('DOMContentLoaded', ()=>{
    const mylessonBlockCenter = document.querySelectorAll('.mylesson-block__center');

    if (mylessonBlockCenter){
        mylessonBlockCenter.forEach(item=>{
            if (item.scrollHeight > 200){
                        item.classList.add('mylesson-block__centerLong');
                    }
        })
        
    }

    

})