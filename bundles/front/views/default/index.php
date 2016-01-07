<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 05.01.2016
 * Time: 13:10
 */?>

<div class="index-content">
    <div class="row">
        <div class="name"><p>Ryazantsev Sergey</p></div>
        <div class="amethyst"><img src="/assets/img/amethyst.png" alt="amethyst"></div>
        <div class="name"><p>Leshchev Nikita</p></div>
    </div>
    <div class="subscribe">
        <form method="post" id="subscribe-form">
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="Ваш Email"><button type="submit">Подписаться</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var subscribe_path = '<?=$this->getPath('front', 'subscribe')?>';
</script>
<script type="text/javascript" src="/assets/js/subscribe.js"></script>
