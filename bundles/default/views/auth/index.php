<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 13:09
 */ ?>

<div class="form-box" id="login-box">
    <div class="header bg-red">Авторизация</div>
    <form method="post" id="loginForm">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Пароль"/>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember_me"/> Запомнить меня
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-red btn-block">Войти</button>
<!--            <p><a href="#">Забыл пароль</a></p>-->
        </div>
    </form>
</div>
<script type="text/javascript">
    var loginPath = "<?=\core\Routing::getPath('login');?>";
    var homePath = "<?=\core\Routing::getPath('home');?>";
</script>
<script src="/admin/assets/js/auth/index/main.js" type="text/javascript"></script>
