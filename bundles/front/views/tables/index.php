<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 20:43
 */ ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Заказанные столы</h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="return false;" class="current"><i class="fa fa-book"></i>Заказанные столы</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Фильтры</h3>
                            <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <div class="input-group">
                                        <label for="date-from">Дата с</label>
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="date-from" value="<?=$this->from->format('d.m.Y')?>">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <div class="input-group">
                                        <label for="date-to">Дата по</label>
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="date-to" value="<?=isset($this->to) ? $this->to->format('d.m.Y') : ''?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table id="tables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Дата и время</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->tables as $table): ?>
                                <tr>
                                    <td><?=$table['name']?></td>
                                    <td><?=$table['phone']?></td>
                                    <td><?=$table['email']?></td>
                                    <td><?=(new DateTime($table['date']))->format('d.m.Y H:i')?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewOrder" data-id="<?=$table['id']?>" data-comment="<?=$table['comment']?>" data-date="<?=(new DateTime($table['date']))->format('d.m.Y H:i')?>" data-email="<?=$table['email']?>" data-phone="<?=$table['phone']?>" data-name="<?=$table['name']?>" title="Посмотреть">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="viewOrder" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Заказ</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>Столик заказан на <span id="modal-date">##.##.#### ##:##</span></h4>
                                    <p><b>Имя: </b><span id="modal-name"></span></p>
                                    <p><b>Телефон: </b><span id="modal-phone"></span></p>
                                    <p><b>Почта: </b><span id="modal-email"></span></p>
                                    <p><b>Комментарий: </b></p>
                                    <p id="modal-comment"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
<script type="text/javascript">
    var homePath = "<?=\core\Routing::getPath('home');?>";
</script>
<script src="/admin/assets/js/tables/index/main.js" type="text/javascript"></script>