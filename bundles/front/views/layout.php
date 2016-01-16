<?php /**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:47
 */ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Веб-студия Аметист</title>
    <link rel="stylesheet" href="/assets/css/style.min.css" charset="utf-8" />
    <link rel="stylesheet" href="/assets/js/libraries/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" charset="utf-8" />
    <script type="text/javascript" src="/assets/js/libraries/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/libraries/bower_components/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="/assets/js/libraries/bower_components/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="/assets/js/libraries/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/assets/js/modal.js"></script>
    <script type="text/javascript" src="/assets/js/libraries/functions.js"></script>
</head>
<body>
<!--    <div class="top-menu">-->
<!--        <div class="mobile-toggle">-->
<!--            <a href="#" class="logo"></a>-->
<!--            <a href="#"></a>-->
<!--        </div>-->
<!--        <ul class="menu horizontal">-->
<!--            <li>Главная</li>-->
<!--            <li>Портфолио</li>-->
<!--            <li>Услуги</li>-->
<!--            <li>О нас</li>-->
<!--            <li>Контакты</li>-->
<!--        </ul>-->
<!--    </div>-->
    <?php include $content; ?>
    <div class="footer">
        <div class="offer">
            <p>Расскажи о нас друзьям и получи скидку на наши услуги</p>
        </div>
        <div class="content">
            <ul class="menu horizontal">
                <li class="logo"><a href="/"></a></li>
<!--                <li>О нас</li>-->
<!--                <li>Новости</li>-->
<!--                <li>Контакты</li>-->
<!--                <li>Документация</li>-->
<!--                <li>Вакансии</li>-->
            </ul>
            <ul class="menu horizontal social">
                <li>Следите за нами: </li>
                <li><a href="https://www.behance.net/AmethystWebStudio" class="be" title="Be"></a></li>
                <li><a href="http://vk.com/amethystwebstudio" class="vk" title="Вконтакте"></a></li>
                <li><a href="https://www.instagram.com/amethyst_web_studio/?ref=badge" class="inst" title="Instagramm"></a></li>
                <li><a href="https://www.facebook.com/amethystwebstudio/" class="fb" title="Facebook"></a></li>
            </ul>
        </div>
        <div class="copyright">
            <p>&copy; Amethyst Web Studio <?=date('Y')?> <span class="upper">все права защищены</span></p>
        </div>
    </div>
</body>
</html>
