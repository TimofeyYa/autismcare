<header class="system-header">
        <div class="system-header__wrap">
            <div class="page-name">
                <h1><?= $pageName ;?></h1>
            </div>
            <div class="header__right-blocks">
                <div class="header-block header-block__bell">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37"
                        height="40" viewBox="0 0 37 40">
                        <image id="bell" width="37" height="40"
                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAoCAYAAAB5ADPdAAAEMElEQVRYhdWYa4hVVRTHf87YiNWQfSgkrIYaamR64FxLsg99SCIK5kYPsKIg0KYyuBnVl+hhnypQuyBCOb2womKibjUYUSiWFOURKjNLsiiKEuwpY46asab/viy251zPnXumoT9c9jp3r7P2/+y19tpr7yn9j22mAJwIJMBfwHnAb3lN1iqlw/5rO8I73cD0HLbnAbOkf04O/WOA07I6G5G6H9gBrM8xSHtOmwHmnq+BO5shtRhYJvn4HIM0i2Olv7xcTa7LQ8qcvEryH8A1OQY8yslTc+hfBYxIXlOuJr2NSHUAz6v9G7gS+DTD8FyR/xJ4yf3/NrANWAnMyXj3I+BayUcDa8vVpB4CMSnz8ZmSHwbeTTHYA7wDfAwsAc4Aprh+k2cDdwBbgDczgvp15xEjf0vdgEsJM4BvgeOAnUCvlriH+X+Nvi4gEfnpmt0DwALgXKezB7gReDWy1wlsB04CdgFdtUppr/f/YhEy3JtCaJEIBTwDPAR8kzILaAZtsSxUYA8B1wMvOp0/tcoHletuAlZ79y1Sa7P0cjTARcDjki1AyzKQRcjwleJmoT7QxnpWC8ljLfCjns1mPabm6MsMT8sNAeaWp6S7H7hc8ZAXtgiuls0OEat7qFYpjQLP6XFuuZp0B1IXuwFeiQa72QWqTfWGJggFDAOPSu6VGz2GnLwgkLpQ7c/AF9ELYVV8D6wYB6EAi7/dkpdEfVuUEw3zA6ketUmk3O36bIpHWyC11wW5bdozQ0etUjro8uHsQCq4Z2dkaJ6Th1sgFPCGk8+P+nao7WrTFtGhP3ZHiqc4eVsBpD538qlR3+9qO9u0EsJq2xUpTnPyrwWQ2uPk9qjvpyBMla9vAPqUMyYLg4qzTSFfvKDfpKFWKVnoLCVnQfaf439JqlNtK/nJY8TJM8ZLKiS4IlYe+rhAbGaW0pFI9andXhApb6svS6ERqdPdFrOxQFLvqS1lzVYjUgNOrhVIKlSfba6Gy0VqltvJrV6ON+pWsNG58K5yNTkhD6l2FXqhDrcaqkgcAh6UPSu/nyhXE3/wOIyUda5W4Y+Kr3XFchqDldtvSb7CFYCppFap0kQ19gATg0Oqx7+TdXPjI2mk5gO3SbYDwWXALxNEClUFlwI/6PmecjU5i+iIfbaT7wasGuzKMNihd0cy+gPsdmWfzoJpsArlPv49mKAbm62e1FYnD2UYmWiMFYHefZtsJUwSGcPyWqX0CSk3JANKBz3p741hmlaofdD7wJMZercra48qVg82sPlZrVKq58K0a5sP9WuEfi2EC5Rz4ouQfre3vdaAeOr1Yp67pDQ8AFyi99cplQxr9ozQrcp5+9zlW26Ml9Rm5bNBnYaWhlLWYb9uWpo+BbVSeVrs2cXHByl9tr/ZqTu+KMmF8c5UgAW6Jd2TdVFmRzU79oeE2DyAfwApF9tAIGUXRAAAAABJRU5ErkJggg==" />
                    </svg>
                </div>
                <div class="header-block header-block__chat">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="36"
                        height="37" viewBox="0 0 36 37">
                        <image id="chat_1_" data-name="chat (1)" width="36" height="37"
                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAlCAYAAAAqXEs9AAAD50lEQVRYhcWYeWgVVxTGf4kvjWs1KijBqi0qIe4+hRK10oqg0JqKDRYEUdxxedTlP0URSukftom41JYqbkhbbXhu1QRSAooKPndx3/APV+oObolywjdhMrw3b57Je/1guHdm7p3zzb3nnvPdmzW29BgpogUwHPgMKAS6AW2AEPAEuAWcBw4B/+pZQkQj4QavQilwGQhEgPFAa592/YEvgcXAK7MJrAGqgxgJQuhj4Geg2PXMRqACOAlc0SjUimgPkfoCGASU6LLRmgecawyhWcBPmqbXwAZgLXDap88RYKvqPYEZwGzgc/3AUuBH4G28ztkJPtoM2AisE5ldQC8R9CPjxWVN3SfAFg3AD8DfQPOghIxMOTBZPjBT03UjBSJe3AMmaeqeAl8D++KRikdoPfCV/GI08GsjiHixQ1P3QOWW4rJYlh+hacBU+cs4OWJTI6YffQZ8AyxMRMjiySrV5wNVaSDjIKYfN3xfXBYriEdopRz4H+CXNJJx8CewDfhAK7kBod4KeK8VKzIFm67nwJjistgQN6GISosfVzNI6C7wm+rmJlguy9WLtsBgzW8mYfHtokaqk41Qkchc+R/IWHK9BJwAWlnStsg5Qu8qAvS35VoQ5/kDOWjcdBAAVUredYT6qH0yHWKjudsn/50BTr0noeMqC+3j3XVzOUmnWuWyvnHe3QfOvicZ5C6GrkboQ908DtDx90YY9cNDvWubrcBkeJkmY0HwRm1CIWVfXCPlh4nAkBSN2QralKRNnspHRui2HLtbEsc2WbLZR0MlQq1W4BufNl1V3gkpKI2Ss+706VSj7Nw/RUKnkpDBtVAuGqGjwFztJJKhXFdTw4mFhy11dNK02QhY/b80GPRDB9k3l8jPVh6rVsCbkmEySNrmWLSORsJ3HQd1ZGpEmihTsMT+nWzVZX2H0F+SHR+5pEgmsEg2z0tv1xOyVbBA9eUSbOmGhZolqi+IRsK1eGLKLo1UrvZNTgRPB/Jky7ZB26OR8H7HhjfIOYxNNLVPExnTXnskYy5p31cPL6EJKg9Y1EwDmS7aWhXp+6OjkfBTdwM3oRzJC3Ra0dQo0d7ehNhNHedc9zZyE7JdRz5wDdjbhESGAZXa9nSQOvw0kf5yq785KlcrIRo6Ks/0U2lXlpRjpTK5V7aYow4ARgLfuhSpTc0ybUZrErF3CA3Un6AlXyHjnRP0MwmyQsTvSDFmayHki7SDJzpFKQ3ilw6h6a5nU111O/2woGVHMKaZrWynE7KhOswyAnY5MKFvQfagTjgsnLxIRsRLyHTQBc2rGXYukybxpMMfKltKk9s0GRE7QLAzxsAEGgB4ByZ22eBLMMN+AAAAAElFTkSuQmCC" />
                    </svg>
                </div>
                <div class="header-profil">
                    <div class="header-profil__text">
                        <p class="header-profil__name"><?php echo $_SESSION['user']['full_name']; ?></p>
                        <p class="header-profil__balance"><?php if ($_SESSION['user']['type'] == 1){?>Специалист<?php };
                                 if($_SESSION['user']['type'] == 2){ ?>Клиент<?php } ?></p>
                    </div>
                    <div class="header-profil__pic">
                        <div class="header-profil__pic-wrap"> <img
                                src="uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt=""></div>
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 491.996 491.996"
                            style="enable-background:new 0 0 491.996 491.996;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M484.132,124.986l-16.116-16.228c-5.072-5.068-11.82-7.86-19.032-7.86c-7.208,0-13.964,2.792-19.036,7.86l-183.84,183.848
			L62.056,108.554c-5.064-5.068-11.82-7.856-19.028-7.856s-13.968,2.788-19.036,7.856l-16.12,16.128
			c-10.496,10.488-10.496,27.572,0,38.06l219.136,219.924c5.064,5.064,11.812,8.632,19.084,8.632h0.084
			c7.212,0,13.96-3.572,19.024-8.632l218.932-219.328c5.072-5.064,7.856-12.016,7.864-19.224
			C491.996,136.902,489.204,130.046,484.132,124.986z" />
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
                        <div class="header-profil__menu-wrap">
                            <div class="header-profil__menu">
                                <a href="profil.php" class="header-profil__item">Личный кабинет</a>
                                <a href="#" class="header-profil__item">Настройки</a>
                                <a href="#" class="header-profil__item">Баланс</a>
                                <a href="vendor/signout.php" class="header-profil__item">Выйти</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>