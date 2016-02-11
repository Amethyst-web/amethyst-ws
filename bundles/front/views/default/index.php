<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2016
 * Time: 11:17
 */
?>
<div class="index-content">
    <div class="screen" id="main">
        <div class="wrapper">
            <div></div><div>
                <h1>Amethyst</h1>
                <h3>web studio</h3>
                <p class="utp">Сначала работа, потом деньги. Платите только за то, что уже сделано.</p>
                <p class="utp">Закажите уникальный сайт у нас, а мы позаботимся о нём.</p>
                <a href="#order" class="scroll-to btn">Заказать</a>
            </div>
        </div>
    </div>
    <div class="screen" id="order">
        <div class="wrapper">
            <div>
                <h2>Заказ вашего сайта</h2>
                <p>
                    После заполнения формы обратной связи с Вами свяжется менеджер, и мы обсудим Ваш будущий сайт!
                </p>
            </div><div>
                <form>
                    <p>Закажите звонок через форму обратной связи и получите <span class="big">5%</span> скидку.</p>
                    <div class="input-field">
                        <label for="name">Ваше имя</label>
                        <input type="text" name="name" id="name">
                        <p class="help-block">Чтобы мы знали, как к Вам обращаться.</p>
                    </div>
                    <div class="input-field">
                        <label for="phone">Ваш телефон</label>
                        <input type="text" name="phone" id="phone" placeholder="+7(123)456-78-90">
                        <p class="help-block">Чтобы мы знали, какуда Вам звонить.</p>
                    </div>
                    <div class="input-field">
                        <label for="email">Ваша почта</label>
                        <input type="email" name="email" id="email" placeholder="email@example.com">
                        <p class="help-block">Чтобы мы знали, куда Вам отправить интересующие Вас материалы.</p>
                    </div>
                    <button type="submit" class="btn">Заказать</button>
                </form>
            </div>
        </div>
    </div>
    <div class="screen" id="price">
        <div class="wrapper">
            <h2 class="text-center">Цены</h2>
            <div class="offer">
                <p class="title">Лэндинг</p>
                <ul>
                    <li>Уникальный современный дизайн</li>
                    <li>Слайдер</li>
                    <li>Форма обратной связи</li>
                </ul>
                <p class="price"> от 30.000 р.</p>
            </div><div class="offer">
                <p class="title">Информационный сайт/блог</p>
                <ul>
                    <li>Уникальный дизайн</li>
                    <li>Комментарии (с модерацией)</li>
                    <li>Форма обратной связи</li>
                </ul>
                <p class="price"> от 50.000 р.</p>
            </div><div class="offer">
                <p class="title">Интернет-магазин</p>
                <ul>
                    <li>Продающий дизайн</li>
                    <li>Каталог</li>
                    <li>Корзина</li>
                    <li>Онлайн-оплата</li>
                </ul>
                <p class="price"> от 100.000 р.</p>
            </div>
            <div class="custom text-center">
                <p>Если Вы не увидели свой вариант среди предложенных нами, не отчаивайтесь, закажите обратный звонок и мы обсудим Ваш будущий сайт!</p>
                <a href="#order" class="scroll-to btn">Заказать</a>
            </div>
        </div>
    </div>
    <div class="screen" id="portfolio">
        <div class="wrapper text-center">
            <h2>Портфолио</h2>
            <div>
                <a href="http://hookah-msk.ru" target="_blank">
                    <img src="/assets/img/portfolio/profruss.jpg" alt="profruss.ru" height="294">
                    <p>Я говорю по-русски</p>
                </a>
            </div><div>
                <a href="http://profruss.ru" target="_blank">
                    <img src="/assets/img/portfolio/hookah.jpg" alt="profruss.ru" height="294">
                    <p>Кальянная на Отрадной</p>
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var $form = $('form');
        $form.find("[name='phone']").inputmask("+7 (999) 999-99-99");
        $form.submit(function(e){
            e.preventDefault();
            var $emailField = $form.find('[name=email]');
            var $nameField = $form.find('[name=name]');
            var $phoneField = $form.find('[name=phone]');
            $emailField.removeClass('error');
            var email = $emailField.val();
            var errors = false;
            if(!checkEmail(email)){
                $emailField.addClass('error');
                errors = true;
            }
            var phone = $phoneField.val();
            if(!checkPhone(phone)){
                $phoneField.addClass('error');
                errors = true;
            }
            var name = $nameField.val().trim();
            if(name.length === 0){
                $nameField.addClass('error');
                errors = true;
            }
            if(errors) {
                return false;
            }
            $.post('/add-request', {email: email, phone: phone, name: name}, function(data){
                if(!checkData(data)) return false;
                if(!data.result){
                    errorNoty(data.error);
                    return false;
                } else {
                    successNoty(data.message);
                    $form.find('input').val('')
                }
            });
        });
        $('.scroll-to').click(function(e){
            e.preventDefault();
            var position = $($(this).attr('href')).position();
            $('body').stop().animate({scrollTop:position.top}, '1500', 'swing');
        });
    });
</script>
