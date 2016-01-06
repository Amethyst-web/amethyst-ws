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
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body>
    <div class="top-menu">
        <div class="mobile-toggle">
            <a href="#" class="logo"></a>
            <a href="#"></a>
        </div>
        <ul class="menu horizontal">
            <li>Главная</li>
            <li>Портфолио</li>
            <li>Услуги</li>
            <li>О нас</li>
            <li>Контакты</li>
        </ul>
    </div>
    <div class="index-content">
        <div class="row">
            <div class="name"><p>Ryazantsev Sergey</p></div>
            <div class="amethyst"><img src="/assets/img/amethyst.png" alt="amethyst"></div>
            <div class="name"><p>Leshchev Nikita</p></div>
        </div>
        <div class="subscribe">
            <form method="post">
                <div class="input-group">
                    <input type="email" name="email" id="email" placeholder="Ваш Email"><button type="submit">Подписаться</button>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="offer">
            <p>Расскажи о нас друзьям и получи скидку на наши услуги</p>
        </div>
        <div class="content">
            <ul class="menu horizontal">
                <li class="logo"><a href="/"></a></li>
                <li>О нас</li>
                <li>Новости</li>
                <li>Контакты</li>
                <li>Документация</li>
                <li>Вакансии</li>
            </ul>
            <ul class="menu horizontal social">
                <li>Следите за нами: </li>
                <li><a href="#" class="be" title="Be"></a></li>
                <li><a href="#" class="vk" title="Вконтакте"></a></li>
                <li><a href="#" class="fb" title="Instagramm"></a></li>
                <li><a href="#" class="inst" title="Facebook"></a></li>
            </ul>
        </div>
        <div class="copyright">
            <p>&copy; Amethyst Web Studio <?=date('Y')?> <span class="upper">все права защищены</span></p>
        </div>
    </div>
<?php include $content; ?>
</body>
</html>
