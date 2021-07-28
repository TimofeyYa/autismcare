<?php
   session_start();
    if(isset($_SESSION['user'])){
        header('location: profil.php');
    }

   ?>

<!DOCTYPE html>
<html lang="ru">

<head>

<meta name="keywords" content="AutismCare, платформа для аутистов, аутизмкейр, помощь аутистам, платформа для аутистов" />
<meta name="description" content="- это сервис, созданный для решения проблем родителей и улучшения качества жизни детей и взрослых с аутизмом. Тщательно изучая специфику и постоянно общаясь с родителями и специалистами, мы сделали сервис, адаптированный под людей с РАС и под работу с ними. AutismCare online - это онлайн-консультации, удобные личные кабинеты и адаптивные инструменты для работы специалистов. AutismCare bracelet - это уникальный смарт-браслет и искусственный интеллект, предсказывающий состояние эмоционального возбуждения." />
    <meta name="yandex-verification" content="4a3b5a5de8c58a39" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutismCare</title>
    <link rel="shortcut icon" href="source/ico/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/media.css">
</head>

<body>
    <header class="header">
        <div class="video-wrap">
            <video src="source/video/main.webm" class="header-video__wrap" autoplay muted loop></video>
        </div>
        <div class="container">
            <div class="header__top">
                <nav class="header-nav">
                    <ul class="nav-list">
                        <li class="nav-list__item"><a href="#about" class="nav-list__link">О нас</a></li>
                        <li class="nav-list__item"><a href="#product" class="nav-list__link">Продукты</a></li>
                        <li class="nav-list__item"><a href="#contacts" class="nav-list__link">Контакты</a></li>
                    </ul>
                </nav>
                <div class="header-logo">
                    <img src="source/ico/logo.png" alt="">
                </div>
                <div class="header-btn">
                    <button class="sign signup">Регистрация</button>
                    <button class="sign signin">Вход</button>
                </div>
            </div>
            <div class="header__middle">
                <div class="header-title">
                    <h1>AutismCare</h1>
                </div>
                <div class="header-desc">
                    <p>Первый в мире адаптивный сервис для людей с РАС</p>
                </div>
                <div class="header-btn mob-btn__wrap">
                    <button class="sign mob-btn signup">Регистрация</button>
                    <button class="sign signip">Вход</button>
                </div>
            </div>
            <div class="header__bottom">
                <div class="header-block">
                    <div class="header-block__wrap">
                        <div class="header-block__title">
                            <h3>Вся информация в  одном месте</h3>
                        </div>
                        <hr>
                        <div class="header-block__desc">
                            <p>Предоставьте доступ  своему специалисту,  скачайте или просто  распечатайте всё, что  нужно прямо из личного кабинета.</p>
                        </div>
                    </div>
                </div>

                <div class="header-block">
                    <div class="header-block__wrap">
                        <div class="header-block__title">
                            <h3>Адаптивные  инструменты</h3>
                        </div>
                        <hr>
                        <div class="header-block__desc">
                            <p>Онлайн-консультации и их  история, разметка видео и статистика сделают  консультации эффективными и  удобными.</p>
                        </div>
                    </div>
                </div>

                <div class="header-block">
                    <div class="header-block__wrap">
                        <div class="header-block__title">
                            <h3>Все под контролем</h3>
                        </div>
                        <hr>
                        <div class="header-block__desc">
                            <p>Предсказывание состояния эмоционального возбуждения, отслеживание состояние ребенка в режиме реального времени и GPS - трекер</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="about" id="about">
            <div class="container">
                <div class="about-top">

                    <div class="about-top__content">
                        <h2 class="about-title about-title_top">О компании</h2>
                        <div class="about-top__wrap">
                            <div class="about-wrap__content">
                                <div class="about-content__top">
                                    <h2>AutismCare</h2>
                                    <div class="about-logo"><img src="source/ico/logo-mini.png" alt="logo"></div>

                                </div>
                                <div class="about-content__bottom">
                                    <p>- это сервис, созданный для решения проблем родителей и улучшения качества жизни детей и взрослых с аутизмом. Тщательно изучая специфику и постоянно общаясь с родителями и специалистами, мы сделали сервис, адаптированный под людей с РАС и под работу с ними. AutismCare online - это онлайн-консультации, удобные личные кабинеты и адаптивные инструменты для работы специалистов. AutismCare bracelet - это уникальный смарт-браслет и искусственный интеллект, предсказывающий состояние эмоционального возбуждения. </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="about-bottom">
                    <div class="about-bottom__content">
                        <h2 class="about-title about-title_bottom">Наши цели</h2>
                        <div class="about-bottom__wrap">

                            <div class="block-target">
                                <div class="block-target__wrap">
                                    <div class="target-desc">
                                        <p>Дать возможность получения квалифицированной помощи людям из отдаленных уголков</p>
                                    </div>
                                    <div class="target-num">
                                        <h3>1</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="block-target">
                                <div class="block-target__wrap">
                                    <div class="target-desc">
                                        <p>Помочь родителям предотвращать истерики и нежелательное поведение, а не бороться уже с их последствиями</p>
                                    </div>
                                    <div class="target-num">
                                        <h3>2</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="block-target">
                                <div class="block-target__wrap">
                                    <div class="target-desc">
                                        <p>Сократить дистанцию между ребенком и родителями и помочь им решить проблемы</p>
                                    </div>
                                    <div class="target-num">
                                        <h3>3</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="block-target">
                                <div class="block-target__wrap">
                                    <div class="target-desc">
                                        <p>Создать комфортные условия для проведения онлайн-консультаций</p>
                                    </div>
                                    <div class="target-num">
                                        <h3>4</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="select" id="product">
            <div class="container">
                <div class="all-title">
                    <h2>Продукты нашей компании</h2>
                </div>
                <div class="select-btn__wrap">
                    <div class="select-btn select-btn__platform">AutismCare online</div>
                    <div class="select-btn select-btn__braslet">AutismCare bracelet</div>
                </div>
            </div>
        </section>
        <div class="platform">
            <div class="section-name section-name__platform">
                <h2>AutismCare online</h2>
            </div>
            <section class="desc__section desc__section-online">
                <div class="container">
                    <div class="sistem-braslet">   
                        <div class="sistem-top__desc">
                            <p>это не просто удобная платформа для онлайн-консультаций, это комплексное решение, которое решает проблему хранения информации, поиска специалистов, сбора статистики, а также объединяет людей, стирает расстояние между специалистом и родителем и позволяет проводить и получать консультации в любое время и в любом месте</p>
                            <div class="specialist-logo specialist-logo__braslet">
                                <img src="source/ico/logo-mini.png" alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="perents">
                <div class="container">
                    
                    <div class="all-title perents-title">
                        <h2>Родителям</h2>
                    </div>
                    <div class="perents__wrap">
                        <div class="perents-side perents-left">
                            <div class="perents-left__img">
                                <img src="source/photo/perent1.jpg" alt="девушка и ребёнок">
                            </div>
                            <div class="perent-subtitle">
                                <h2>Получайте консультации
                                    в любом уголке Земли</h2>
                            </div>
                            <div class="perents__desc">
                                <p>Если в вашем городе нет специалистов, занимающихся реабилитацией детей с РАС или вы
                                    хотите получить консультацию специалиста, который находиться в другом городе или
                                    даже стране, просто зарегистрируйтесь на платформе AutismCare и приступайте в
                                    поискам "своего" специалиста. </p>
                            </div>
                            <div class="perents-btn">
                                <button class="perent-left__btn">Начать работу</button>
                            </div>
                        </div>
                        <div class="perents-side perents-right">
                            <div class="perents-right__pic">
                                <img class="perents-right__img" src="source/photo/perent2.jpg" alt="">
                            </div>
                            <div class="perent-subtitle">
                                <h2>Вся информация в одном месте</h2>
                            </div>
                            <div class="perents__desc">
                                <p>Выбирая AutismCare online, вы получаете не только онлайн-консультации, но и удобный личный
                                    кабинет, в котором хранится вся нужная информация:</p>
                                <ul class="perents__list">
                                    <li class="perents__item">расписание;</li>
                                    <li class="perents__item">история и запись консультаций, которые вы сможете
                                        просмотреть в любое время;</li>
                                    <li class="perents__item">файлы, которыми вы сможете делиться со специалистами;
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="specialist">
                <div class="container">
                    <div class="all-title">
                        <h2>Специалистам</h2>
                    </div>
                    <div class="specialist__wrap">
                        <div class="specialist-pic">
                            <div class="specialist-img">
                                <img src="source/photo/sp.jpg" alt="specialist">
                            </div>
                            <div class="specialist-logo">
                                <img src="source/ico/logo-mini.png" alt="logo">
                            </div>
                            <div class="specialist-sq__content">
                                <div class="specialist-sq__wrap">
                                    <div class="specialist-sq__title">
                                        <h3>Адаптивные
                                            инструменты</h3>
                                    </div>
                                    <div class="specialist-sq__desc">
                                        <p>Мы изучили проблему, собрали лучшие идеи и создали продукт, который поможет в
                                            работе специалистам, сделает консультации еще более эффективными и удобными.
                                            Теперь Вам не нужно переключаться между кучей приложений. Всё, от самой
                                            онлайн-консультации до разметки видео и статистики, собрано в одном месте
                                        </p>
                                    </div>
                                    <div class="specialist-sq__btn">
                                        <button>Регистрация</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="specialist-main">
                            <div class="specialist-main__title">
                                <h3>ОСНОВНОЙ ФУНКЦИОНАЛ
                                    РАБОЧЕГО МЕСТА СПЕЦИАЛИСТА</h3>
                            </div>
                            <ul class="specialist-main__list">
                                <li class="specialist-main__item">доступ к электронной картотеке;</li>
                                <li class="specialist-main__item">доступ к записям консультаций;</li>
                                <li class="specialist-main__item">возможность разметки видео в процессе консультации
                                    (маркировка важных моментов);</li>
                                <li class="specialist-main__item">возможность вносить необходимые данные, не отвлекаясь
                                    на сторонние приложения во время консультации.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="howitwork">
                <div class="container">
                    <div class="all-title">
                        <h2>Как проходит онлайн-консультация</h2>
                    </div>
                    <div class="howitwork__content">
                        <div class="howitwork__block">
                            <div class="howitwork__control">
                                <buttton id="perent-btn" class="howitwork__btn howitwork__btn-active">Родитель или
                                    опекун</buttton>
                                <buttton id="spec-btn" class="howitwork__btn ">Специалист</buttton>
                            </div>
                            <div class="howitwork__text howitwork__text-parent">
                                <p>Регистрируетесь на платформе, заполняете необходимую информацию. Затем ищете
                                    подходящего специалиста в нашей базе и отправляете заявку. После подтверждения обоих
                                    сторон, выбирается дата и время консультации, специалист автоматически попадает в
                                    список "ваших специалистов", формируется запись в расписании. В назначенное время
                                    появится кнопка "Начать консультацию", консультация будет проходит прямо на нашей
                                    платформе, вам не нужно будет переходить по ссылкам или скачивать какое-то
                                    дополнительное программное обеспечение.</p>
                            </div>
                            <div class="howitwork__text howitwork__text-spec">
                                <p>Регистрируетесь на платформе, заполняете и подтверждаете информацию о вашем
                                    образовании и опыте. Получаете заявки на консультации, в которых вы сможете изучить
                                    информацию, предоставленную клиентом, а также при необходимости задать уточняющие
                                    вопросы в чате. Принимаете заявки и договариваетесь о дате и времени консультации.
                                    Клиенты сразу попадают в ваш список и формируется запись в расписании. Во время
                                    консультации вы сможете добавлять необходимые метки на видео и писать комментарии, к
                                    которым потом можно будет вернуться или выгрузить в виде файла.</p>
                            </div>
                        </div>
                    </div>
                    <div class="howitwork__mail-btn">
                        <button class="go-cont">Подписаться на новости</button>
                    </div>
                </div>
            </section>
        </div>
        <div class="section-name desc__section-braslet">
            <h2>AutismCare bracelet</h2>
        </div>
        <section class="desc__section ">
            <div class="container">
                <div class="sistem-braslet">   
                    <div class="sistem-top__desc">
                        <p>- система контроля за эмоциональным возбуждением. Состоит из двух элементов: первый - это носимый элемент (смарт-браслет), который имеет определенный набор функционала и адаптирован для людей с РАС, второй - облачное решение на основе ИИ, которое с высокой точностью определяет степень и природу эмоционального возбуждения</p>
                        <div class="specialist-logo specialist-logo__braslet">
                            <img src="source/ico/logo-mini.png" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="perents">
            <div class="container">
                <div class="all-title perents-title">
                    <h2></h2>
                </div>
                <div class="perents__wrap">
                    <div class="perents-side perents-left">
                        <div class="perents-left__img">
                            <img src="source/photo/braslet1.jpg" alt="девушка и ребёнок">
                        </div>
                        <div class="perent-subtitle">
                            <h2>Узнавайте об эмоциональном возбуждении заранее</h2>
                        </div>
                        <div class="perents__desc">
                            <p>AutismCare bracelet прогнозирует эмоциональное возбуждение на ранней стадии. Родители и сопровождающие взрослые смогут предотвратить развитие истерики и нежелательного поведения, а не бороться с их последствиями.&nbsp;</p>
                        </div>
                        <div class="perents-btn">
                            <button class="perent-left__btn go-cont">Оставить заявку</button>
                        </div>
                    </div>
                    <div class="perents-side perents-right">
                        <div class="perents-right__pic">
                            <img class="perents-right__img" src="source/photo/braslet2.jpg" alt="">
                        </div>
                        <div class="perent-subtitle">
                            <h2>Всё под контролем</h2>
                        </div>
                        <div class="perents__desc">
                            <p></p>
                            <ul class="perents__list">
                                <li class="perents__item">в случае потери визуального контакта, отследить местоположение ребенка можно с помощью встроенного GPS - трекера;</li>
                                <li class="perents__item">вы сможете отслеживать состояние ребенка даже на расстоянии;</li>
                                <li class="perents__item">если браслет будет снят, вы сразу получите уведомление на телефон и геолокацию;
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="braslet">
            <div class="sistem">
                <div class="container">
                    <div class="perks_braslet">
                        <div class="perks__block perks__block-text">
                            <div class="all-title">
                                <h2>Дизайн браслета</h2>
                            </div>
                            <div class="perks__block-title">
                                <h3>Перед нами стояла задача сделать такой браслет, который обеспечивал бы качественный сбор биометрических показателей, эргономично смотрелся на руке ребенка, и не был бы раздражителем для ребенка. Поэтому мы:</h3>

                            </div>
                            <ul class="perks-list">
                                <li class="perks-list__item">разработали уникальную форму браслета, которая вмещает в себя необходимые датчики, но при этом не смотрится громоздко на руке ребенка</li>
                                <li class="perks-list__item">выбрали цвет, не привлекающий внимание ребенка;</li>
                                <li class="perks-list__item">разработали уникальный состав полимера для ремешка, который не вызывает раздражения на коже;</li>
                                
                            </ul>
                        </div>
                        <div class="perks__block perks__block-pic">
                            <div class="perks-imgarea">
                                <img src="source/braslet/1.png" alt="">
                            </div>
                            <div class="perks-img__controls">
                                <img src="source/braslet/1.png" alt="">
                                <img src="source/braslet/2.png" alt="">
                                <img src="source/braslet/3.png" alt="">
                                <img src="source/braslet/4.png" alt="">
                                <img src="source/braslet/5.png" alt="">
                                <img src="source/braslet/6.png" alt="">
                            </div>
                            <div class="perks-btn">
                                <button class="go-cont">Узнать больше</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="smi">
            <div class="container">
                <div class="all-title">
                    <h2>Сми о нас</h2>
                </div>
                <div class="smi-wrap">
                    <div class="smi-media">
                        <div class="smi-item smi-media__section smi-item_1">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/YJkbcooa2eA"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        <div class="smi-item smi-media__section smi-item_2">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/GdIkH9bxNGU"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        <div class="smi-item smi-media__section smi-item_3">
                            <img class="smi-desc__img-media" src="source/ico/beimg.jpg">
                        </div>
                    </div>
                    <div class="smi-desc">
                        <div class="smi-desc__text">
                            <div class="smi-desc__title">
                                <div class="smi-item smi-item_1">
                                    <div class="smi-item__wrap">
                                        <h3>Вести Новосибирск</h3>
                                        <img class="smi-desc__title-logo" src="source/ico/vesti.jpg">
                                    </div>
                                </div>
                                <div class="smi-item smi-item_2">
                                    <div class="smi-item__wrap">
                                        <h3>Новосибирские Новости</h3>
                                        <img class="smi-desc__title-logo" src="source/ico/nnovosti.jpg">
                                    </div>
                                </div>
                                <div class="smi-item smi-item_3">
                                    <div class="smi-item__wrap">
                                        <h3>Билайн</h3>
                                        <img class="smi-desc__title-logo" src="source/ico/belinelogo.png">
                                    </div>
                                </div>
                            </div>
                            <div class="smi-desc__desc">
                                <p class="smi-item smi-item_1">Программа считывает любой импульс от эмоции ребёнка и
                                    передаёт
                                    родителям. <br><br>

                                    Новосибирские изобретатели готовятся представить сервис для родителей, дети которых
                                    больны аутизмом. Разработка включает в себя, в том числе, браслет для особенных
                                    малышей. Он поможет значительно облегчить жизнь ребёнку. Эта программа считывает
                                    каждый импульс, который даёт эмоция. Электродермальная активность, или ток на коже,
                                    даёт сигнал родителю, что ребёнок встревожен. <br><br>

                                    «Она отражает проводимость. Проводимость изменяется, когда у нас выделяется пот.
                                    Знаете полиграф ─ детектор лжи? Это, собственно, полиграфический метод. Изменяется
                                    проводимость, и мы можем это зафиксировать», ─ пояснил инженер лаборатории Иван
                                    Брак. </p>
                                <p class="smi-item smi-item_2">

                                    «Учащение пульса может говорить и о реакции, и о физической активности, поэтому
                                    подключается датчик кожно-гальванической реакции. Совокупность датчиков позволяет
                                    увидеть — это просто физическая активность или раздражение на что-то», — объяснил
                                    исполнительный директор компании-разработчика сервиса для родителей детей с аутизмом
                                    Сергей Лиджиев.<br><br>

                                    Разработку хотели профинансировать японцы, но тогда использовать её могли бы только
                                    они, поэтому инноватор отказал. В будущем Сергей Лиджиев готов предложить родителям
                                    детей с аутизмом такие браслеты бесплатно, а в сфере использования пойти ещё дальше.
                                    Гаджет может помочь следить за состоянием малышей в детских садах или больных после
                                    инсульта.</p>
                                    <p class="smi-item smi-item_3">

                                        Билайн поддержал разработку браслета AutismCare*, предназначенного для мониторинга
                                        эмоционального состояния ребенка с расстройством аутистического спектра (РАС).
                                        Реализация проекта осуществляется путем передачи по GSM-каналу на телефон родителей или
                                        педагогов, занимающихся с ребёнком, информации о степени и характере его эмоционального
                                        возбуждения. Кроме того, Билайн оказывает экспертную поддержку на многих этапах
                                        реализации решения. На данный момент проект находится в разработке, по завершении
                                        которой будет принято решение о дальнейшем формате сотрудничества.</p>
                            </div>
                            
                        
                    </div>
                    <div class="smi-desc__btn">
                        <div class="smi-controls smi-arrow arrow-left">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 240.823 240.823"
                                style="enable-background:new 0 0 240.823 240.823;" xml:space="preserve">
                                <g>
                                    <path id="Chevron_Right" d="M57.633,129.007L165.93,237.268c4.752,4.74,12.451,4.74,17.215,0c4.752-4.74,4.752-12.439,0-17.179
		l-99.707-99.671l99.695-99.671c4.752-4.74,4.752-12.439,0-17.191c-4.752-4.74-12.463-4.74-17.215,0L57.621,111.816
		C52.942,116.507,52.942,124.327,57.633,129.007z" />
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </div>
                        <a href="https://www.youtube.com/watch?v=YJkbcooa2eA"
                            class="smi-item smi-item_1 smi-controls smi-action">Подробнее</a>
                        <a href="https://nsknews.info/materials/braslet-dlya-autistov-i-menyayushchiy-emotsii-smartfon-razrabotali-novosibirtsy/"
                            class="smi-item smi-item_2 smi-controls smi-action">Подробнее</a>
                            <a href="https://moskva.beeline.ru/about/press-center-new/press-center-new/details/1601833/"
                            class="smi-item smi-item_3 smi-controls smi-action">Подробнее</a>
                        <div class="smi-controls smi-arrow arrow-right">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 240.823 240.823"
                                style="enable-background:new 0 0 240.823 240.823;" xml:space="preserve">
                                <g>
                                    <path id="Chevron_Right_1_" d="M183.189,111.816L74.892,3.555c-4.752-4.74-12.451-4.74-17.215,0c-4.752,4.74-4.752,12.439,0,17.179
		l99.707,99.671l-99.695,99.671c-4.752,4.74-4.752,12.439,0,17.191c4.752,4.74,12.463,4.74,17.215,0l108.297-108.261
		C187.881,124.315,187.881,116.495,183.189,111.816z" />
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section class="partners">
            <div class="container">
                <div class="all-title">
                    <h2>При поддержке</h2>
                </div>
                <div class="partners__wrap">
                    <div class="partners_block"><img src="source/ico/logovimpel.png" alt=""></div>
                    <div class="partners_block"><img src="source/ico/logonaudi.jpg" alt=""></div>
                    <div class="partners_block"><img src="source/ico/logoakadem.png" alt=""></div>
                    <div class="partners_block partners_block-add">
                        <a href="#contacts" class="partners_block__wrap">
                            <img src="source/ico/plus.png" alt="">
                            <h3>Стать партнёром</h3>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="contacts" id='contacts'>
            <div class="container">
                <div class="contacts_content contacts-left">
                    <div class="all-title">
                        <h2>Свяжитесь
                            с нами</h2>
                    </div>
                    <form action="send.php" methood="GET" class="contact-form">
                        <input name='name' type="text" placeholder="Ваше имя" required>
                        <input name='phone' type="phone" placeholder="Ваш номер телефона" required>
                        <input name='email' type="email" placeholder="Ваш E-mail" required>
                        <select name="select" class="select-item">
                            <option class="select-item__disabled" disabled selected required>Какая услуга вам интересна?</option>
                            <option value="Все">Все</option>
                            <option value="AutismCare online">AutismCare online</option>
                            <option value="AutismCare bracelet">AutismCare bracelet</option>
                        </select>
                        <textarea name="comment" placeholder="Комментарий"></textarea>
                        <div class="contact-form__btn"><button type="submit">Отправить</button></div>
                        <p>Нажимая на кнопку отправить вы соглашаетесь с  <a href="source/Politika.docx" download class="polit">политикой конфидециальности</a></p>
                    </form>
                </div>
                <div class="contacts_content contacts-right">
                    <div class="contact__pic">
                        <img src="source/photo/contacts.png" alt="">
                    </div>
                    <div class="contacts__wrap">
                        <div class="contacts__link">
                            <div class="contacts__item">
                                <a class="contacts__item-link">autismcare@yandex.ru</a>
                                <a href="tel: 89854041526" class="contacts__item-link">8 995 404 15 26</a>
                            </div>
                        </div>
                        <div class="contacts__social">
                            <div class="contacts__social-gr">
                                <a href="https://www.facebook.com/profile.php?id=100042839256792" class="sosial-link"><img src="source/ico/face.png" alt=""></a>
                                <a href="https://t.me/SergLidzhiev" class="sosial-link"><img src="source/ico/tel.png" alt=""></a>
                            </div>
                            <div class="contacts__social-gr">
                                <a href="https://wa.me/79954041526" class="sosial-link"><img src="source/ico/wa.png" alt=""></a>
                                <a href="https://www.instagram.com/servisautismcare/?utm_medium=copy_link" class="sosial-link"><img src="source/ico/ins.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <img src="source/ico/logo.png" alt="">
            <p>SAVE Group Company © 2021</p>
        </div>
    </footer>

    <?php
    
    if (isset( $_SESSION['OK'])){
        echo ' <div class="popup-form">
        <div class="popup-form__wrap">
            <div class="popup-form__title">
                <h2>Спасибо за вашу заявку!</h2>
            </div>
        </div>
    </div>';
    unset($_SESSION['OK']);
    }
        ?>

    <div class="sign-form sign-form__signup sign-form__none">
        <div class="sign-form__content">
            <div class="sign-form__title">
                <h2>Регистрация</h2>
            </div>
            <div class="sign-form__exit">
                <svg height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Exit-Out-Arrow-Arrows-Direction-User_Interface" data-name="Exit-Out-Arrow-Arrows-Direction-User Interface"><path d="m61 5v14a3 3 0 0 1 -6 0v-5.76l-23.7 23.7a3 3 0 0 1 -4.24-4.24l23.7-23.7h-5.76a3 3 0 0 1 0-6h14a2.006 2.006 0 0 1 2 2z"/><path d="m60.83 35.02c0 .11-.01.22-.02.34a29 29 0 1 1 -32.17-32.17 3.012 3.012 0 0 1 2.61 4.98 2.98 2.98 0 0 1 -1.89.98 23 23 0 1 0 25.49 25.49 2.978 2.978 0 0 1 2.97-2.64 3.015 3.015 0 0 1 3.01 3.02z"/></g></svg>
            </div>
            <form action="#" class="sign-form__form sign-form__form-signup">
                <input type="text" name="name" placeholder="Ваше имя">
                <input type="text" name="login" placeholder="Ваш Логин">
                <input type="text" name="email" placeholder="Ваш E-mail">
                <input type="text" name="password" placeholder="Введите пароль">
                <input type="text" name="password__confirm" placeholder="Повторите пароль">
                <select name="type_user" id="" required>
                    <option value="none" selected disabled>Ваша роль</option>
                    <option value="1">Пациент</option>
                    <option value="2">Специалист</option>
                </select>
                <button type="submit">Зарегистрироваться</button>
            </form>
            <div class="form__status form__status-signup">
                <p></p>
            </div>    
        </div>
    </div>

    <div class="sign-form sign-form__signin sign-form__none">
        <div class="sign-form__content">
            <div class="sign-form__title">
                <h2>Вход</h2>
            </div>
            <div class="sign-form__exit">
                <svg height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Exit-Out-Arrow-Arrows-Direction-User_Interface" data-name="Exit-Out-Arrow-Arrows-Direction-User Interface"><path d="m61 5v14a3 3 0 0 1 -6 0v-5.76l-23.7 23.7a3 3 0 0 1 -4.24-4.24l23.7-23.7h-5.76a3 3 0 0 1 0-6h14a2.006 2.006 0 0 1 2 2z"/><path d="m60.83 35.02c0 .11-.01.22-.02.34a29 29 0 1 1 -32.17-32.17 3.012 3.012 0 0 1 2.61 4.98 2.98 2.98 0 0 1 -1.89.98 23 23 0 1 0 25.49 25.49 2.978 2.978 0 0 1 2.97-2.64 3.015 3.015 0 0 1 3.01 3.02z"/></g></svg>
            </div>
            <form action="vendor/signin.php" method="POST" class="sign-form__form sign-form__form-signin">
                <input type="text" name="login" placeholder="Ваш Логин">
                <input type="text" name="password" placeholder="Введите пароль">
                <button type="submit">Войти</button>
            </form>
        </div>
    </div>
    <script src="JS/script.js"></script>
</body>

</html>