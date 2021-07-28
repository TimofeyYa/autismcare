window.addEventListener('DOMContentLoaded', () => {
    // Переключатель для платформы
    const perentBtn = document.querySelector('#perent-btn'),
        specBtn = document.querySelector('#spec-btn'),
        selectorTextPer = document.querySelector('.howitwork__text-parent '),
        selectorTextSpec = document.querySelector('.howitwork__text-spec ');

    specBtn.addEventListener('click', () => {
        selectorTextPer.style.display = 'none';
        selectorTextSpec.style.display = 'block';
        specBtn.classList.add('howitwork__btn-active');
        perentBtn.classList.remove('howitwork__btn-active');
    })
    perentBtn.addEventListener('click', () => {
        selectorTextPer.style.display = 'block';
        selectorTextSpec.style.display = 'none';
        specBtn.classList.remove('howitwork__btn-active');
        perentBtn.classList.add('howitwork__btn-active');
    })

    // Слайдер браслета
    const brasletCont = document.querySelector('.perks-img__controls'),
        perksImg = document.querySelector('.perks-imgarea img'),
        allPerksImg = document.querySelectorAll('.perks-img__controls img');

    function starImg() {
        perksImg.src = allPerksImg[0].src;
    }
    starImg();

    brasletCont.addEventListener('click', (e) => {
        console.log(e.target);
        allPerksImg.forEach(item => {
            if (item == e.target) {
                perksImg.src = e.target.src;
            }
        })
    })


    //скрол до секций


    const selectBtnPlat = document.querySelector('.select-btn__platform'),
        secetBtnBraslet = document.querySelector('.select-btn__braslet'),
        platform = document.querySelector('.platform'),
        braslet = document.querySelector('.desc__section-braslet');

    selectBtnPlat.addEventListener('click', () => {
        scrollToElement(platform);
    })
    secetBtnBraslet.addEventListener('click', () => {
        scrollToElement(braslet);
    })

    function scrollToElement(element) {
        console.dir(element);
        window.scroll({

            top: element.offsetTop,
            behavior: "smooth"
        });
    }

    // Скролл на кнопки
    const button = document.querySelectorAll('.go-cont'),
        contacts = document.querySelector('.contacts');

    button.forEach(item => {
        item.addEventListener('click', () => {
            scrollToElement(contacts);
        });
    })

    // Сми о нас 
    const smiItem = document.querySelectorAll('.smi-item'),
        smiAction = document.querySelector('.smi-action'),
        arrowLeft = document.querySelector('.arrow-left'),
        arrowRight = document.querySelector('.arrow-right');
    let i = 3;
        

    function selectSmi(number) {
        selectNum = `smi-item_${number}`
        smiItem.forEach(item => {

            if (item.classList.contains(selectNum)) {
                item.style.display = 'block';
                
                if (item.classList.contains('smi-action')){
                    item.style.display = 'flex';
                }
            }
        })

        
    }
    function clearSmi(number){
        selectNum = `smi-item_${number}`
        smiItem.forEach(item => {

            if (item.classList.contains(selectNum)) {
                item.style.display = 'none';
            }
        })
    }
    selectSmi(i);
    
    arrowLeft.addEventListener('click', ()=>{
        clearSmi(i)
        i = i-1;
        
        if(i < 1){
            i = 3;
        }
        selectSmi(i);
    })
    arrowRight.addEventListener('click', ()=>{
        clearSmi(i)
        i = i+1;
        
        if(i > 3){
            i = 1;
        }
        selectSmi(i);
    })
    // Убираем попап

    const popupForm = document.querySelector('.popup-form');

    // let timerPopup = setTimeout(() => {
    //     popupForm.style.opacity = 0;
    //     setTimeout(() => {
    //         popupForm.style.display = 'none';
    //     }, 500);
    // }, 5000)
    // if (popupForm) {
    //     window.addEventListener('scroll', () => {

    //         setTimeout(() => {
    //             popupForm.style.opacity = 0;
    //         }, 1000);
    //         setTimeout(() => {
    //             popupForm.style.display = 'none';
    //         }, 1310);
    //     })
    // }

    // Попапы для регистрации и входа
    const signForm__signup = document.querySelector('.sign-form__signup'),
          signForm__signin = document.querySelector('.sign-form__signin'),
          signup = document.querySelector('.signup'),
          signin = document.querySelector('.signin'),
          exit = document.querySelectorAll('.sign-form__exit')

          signup.addEventListener('click', ()=>{
            signForm__signup.classList.remove('sign-form__none');
          });

          exit.forEach(item => {
              item.addEventListener('click', ()=>{
            signForm__signup.classList.add('sign-form__none');
            signForm__signin.classList.add('sign-form__none');
          }); 
          })
         

          signin.addEventListener('click', ()=>{
            signForm__signin.classList.remove('sign-form__none');
          });



        // Регистрация
        
        const signupForm = document.querySelector('.sign-form__form-signup'),
              signupForm_name = signupForm.querySelector('input[name="name"]'),
              signupForm_login = signupForm.querySelector('input[name="login"]')
              signupForm_email = signupForm.querySelector('input[name="email"]')
              signupForm_password = signupForm.querySelector('input[name="password"]'),
              signupForm_password__confirm = signupForm.querySelector('input[name="password__confirm"]'),
              signupForm_select = signupForm.querySelector('select[name="type_user"]'),
              signupForm_status = document.querySelector('.form__status-signup p'),
              signupForm_data = [signupForm_name,signupForm_login,signupForm_email,signupForm_password,signupForm_password,signupForm_select];

        signupForm.addEventListener('submit', (e)=>{
            e.preventDefault();
            
             if (signupForm_name.value.length > 50){
                signupForm_status.textContent = 'Ваше имя превышает 50 символов';
                } else if ( signupForm_login.value.length > 50){
                    signupForm_status.textContent = 'Ваш логин превышает 50 символов';
                }else if ( signupForm_login.value.length < 5){
                    signupForm_status.textContent = 'Ваш логин должен содержать более 5 символов';
                }else if (signupForm_password.value.length > 100){
                    signupForm_status.textContent = 'Ваша пароль превышает 100 символов';
                }else if ( signupForm_password.value.length < 7){
                    signupForm_status.textContent = 'Ваш пароль должен содержать больше 7 символов';
                }else if ( signupForm_password.value !=  signupForm_password__confirm.value){
                    signupForm_status.textContent = 'Ваши пароли не совпадают';
                }else if ( signupForm_select.value == 'none'){
                    signupForm_status.textContent = 'Укажите вашу роль на платформе';
                }else{
                        let formData = new FormData(signupForm);
                    const requst = new XMLHttpRequest();
                    requst.open('POST', 'vendor/mail.php');
                    
                    
                    requst.send(formData);
                    requst.addEventListener('load', ()=>{
                        
                        if (requst.status === 200){
                            alert('Проверьте вашу почту!');
                            
                        }else{
                            alert(requst.status);
                        }
                    })
                }
                
                


        })
})