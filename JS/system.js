window.addEventListener('DOMContentLoaded', () => {
    // document.querySelector('.pop-edu__vie-wrap').style.height = document.documentElement.offsetHeight + 'px';
   




    const navSection = document.querySelectorAll('.nav-panel__section');


    navSection.forEach(item => {
        item.addEventListener('click', () => {
            if (item.style.height == 'auto') {
                navSection.forEach(el => {
                    el.style.height = '58px';
                })
            } else {
                navSection.forEach(el => {
                    el.style.height = '58px';
                })
                item.style.height = 'auto';
            }

        })
    })

    
    // showEduArea();







})