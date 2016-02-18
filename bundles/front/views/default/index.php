<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2016
 * Time: 11:17
 */
?>
<!-- Google Code for &#1051;&#1080;&#1076;&#1099; &#1089; &#1075;&#1083;&#1072;&#1074;&#1085;&#1086;&#1081; Conversion Page
In your html page, add the snippet and call
goog_report_conversion when someone clicks on the
chosen link or button. -->
<script type="text/javascript">
    /* <![CDATA[ */
    goog_snippet_vars = function() {
        var w = window;
        w.google_conversion_id = 931630775;
        w.google_conversion_label = "Z6vpCP-5iWQQt52evAM";
        w.google_remarketing_only = false;
    }
    // DO NOT CHANGE THE CODE BELOW.
    goog_report_conversion = function(url) {
        goog_snippet_vars();
        window.google_conversion_format = "3";
        var opt = new Object();
        opt.onload_callback = function() {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        }
        var conv_handler = window['google_trackConversion'];
        if (typeof(conv_handler) == 'function') {
            conv_handler(opt);
        }
    }
    /* ]]> */
</script>
<script type="text/javascript"
        src="//www.googleadservices.com/pagead/conversion_async.js">
</script>
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
                        <p class="help-block">Чтобы мы знали, куда Вам звонить.</p>
                    </div>
                    <div class="input-field">
                        <label for="email">Ваша почта</label>
                        <input type="email" name="email" id="email" placeholder="email@example.com">
                        <p class="help-block">Чтобы мы знали, куда Вам отправить интересующие Вас материалы.</p>
                    </div>
                    <button type="submit" class="btn" onclick="goog_report_conversion('http://amethyst-ws.ru/add-request')">Заказать</button>
                    <p class="confidential text-center"><a href="#confidential_terms" data-action="show-modal">Политика конфиденциальности</a></p>
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
                <a href="http://profruss.ru" target="_blank">
                    <img src="/assets/img/portfolio/profruss.jpg" alt="profruss.ru" height="294">
                    <p>Я говорю по-русски</p>
                </a>
            </div><div>
                <a href="http://hookah-msk.ru" target="_blank">
                    <img src="/assets/img/portfolio/hookah.jpg" alt="hookah-msk.ru" height="294">
                    <p>Кальянная на Отрадной</p>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="confidential_terms" data-width="big">
    <div class="modal-body">
        <div class="modal-header">
            <div class="modal-close"><a href="#" data-action="close">X</a></div>
            Политика конфиденциальности
        </div>
    </div>
    <div class="modal-content">
        <div class="text">
            <p class="subtitle">Защита личных данных</p>
            <p>Для защиты ваших личных данных у нас внедрен ряд средств защиты, которые действуют при введении, передаче или работе с вашими личными данными.</p>
            <p class="subtitle">Разглашение личных сведений и передача этих сведений третьим лицам</p>
            <p>Ваши личные сведения могут быть разглашены нами только в том случае это необходимо для: (а) обеспечения соответствия предписаниям закона или требованиям судебного процесса в нашем отношении ; (б) защиты наших прав или собственности (в) принятия срочных мер по обеспечению личной безопасности наших сотрудников или потребителей предоставляемых им услуг, а также обеспечению общественной безопасности. Личные сведения, полученные в наше распоряжение при регистрации, могут передаваться третьим организациям и лицам, состоящим с нами в партнерских отношениях для улучшения качества оказываемых услуг. Эти сведения не будут использоваться в каких-либо иных целях, кроме перечисленных выше. Адрес электронной почты, предоставленный вами при регистрации может использоваться для отправки вам сообщений или уведомлений об изменениях, связанных с вашей заявкой, а также рассылки сообщений о происходящих в компании событиях и изменениях, важной информации о новых товарах и услугах и т.д. Предусмотрена возможность отказа от подписки на эти почтовые сообщения.</p>
            <p class="subtitle">Использование файлов «cookie»</p>
            <p>Когда пользователь посещает веб-узел, на его компьютер записывается файл «cookie» (если пользователь разрешает прием таких файлов). Если же пользователь уже посещал данный веб-узел, файл «cookie» считывается с компьютера. Одно из направлений использования файлов «cookie» связано с тем, что с их помощью облегчается сбор статистики посещения. Эти сведения помогают определять, какая информация, отправляемая заказчикам, может представлять для них наибольший интерес. Сбор этих данных осуществляется в обобщенном виде и никогда не соотносится с личными сведениями пользователей.</p>
            <p>Третьи стороны показывают объявления нашей компании на страницах сайтов в Интернете. Третьи стороны используют cookie, чтобы показывать объявления, основанные на предыдущих посещениях пользователем наших веб-сайтов и интересах в веб-браузерах. Пользователи могут запретить использовать cookie.</p>
            <p class="subtitle">Изменения в заявлении о соблюдении конфиденциальности</p>
            <p>Заявление о соблюдении конфиденциальности предполагается периодически обновлять. При этом будет изменяться дата предыдущего обновления, указанная в начале документа. Сообщения об изменениях в данном заявлении будут размещаться на видном месте наших веб-узлов</p>
            <p>Осуществив заказ на нашем сайте какого-либо товара, Вы соглашаетесь получить смс-уведомление о доставке купленного Вами товара в соответствующее почтовое отделение, согласно указанному вами индексу.</p>
            <p>Благодарим Вас за проявленный интерес к нашей системе!</p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).load(function(){
        $('#confidential_terms').find('.text').mCustomScrollbar();
    });
    $(document).ready(function(){
        $('.screen').css('min-height', $(window).height());
        $('.screen#price .wrapper').css('bottom',$(window).height() <= 720 ? '0' : '180px');
        $(window).resize(function(){
            $('.screen').css('min-height', $(window).height());
            $('.screen#price .wrapper').css('bottom',$(window).height() <= 720 ? '0' : '180px');
        });
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
