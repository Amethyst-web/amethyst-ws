<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 05.12.2015
 * Time: 7:46
 */

$this->title = isset($this->action->name) ? 'Редактирование акции "'.$this->action->name.'"':'Создание новой акции'?>

<section class="content-header">
    <h1><?=$this->title?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=\core\Routing::getPath('actions')?>"><i class="fa fa-book"></i>Акции</a></li>
        <li><a href="#" onclick="return false;" class="current"><i class="fa fa-book"></i><?=$this->title?></a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <?php if(isset($this->errors['global'])):?>
                            <div class="callout callout-danger">
                                <h4>Произошла глобальная ошибка!</h4>
                                <p><?=$this->errors['global']?></p>
                            </div>
                        <?php endif;?>
                        <div class="form-group <?=isset($this->errors['name'])?'has-error':''?>">
                            <label>Название</label>
                            <input type="text" class="form-control" value="<?=$this->action->name?>" name="name" placeholder="Название акции" maxlength="255">
                            <p class="help-block"><?=isset($this->errors['name'])?$this->errors['name']:''?></p>
                        </div>
                        <div class="form-group <?=isset($this->errors['short_text'])?'has-error':''?>">
                            <label>Краткое описание</label>
                            <textarea class="form-control" name="short_text" rows="3" placeholder="Краткое описание акции" maxlength="255"><?=$this->action->short_text?></textarea>
                            <p class="help-block"><?=isset($this->errors['short_text'])?$this->errors['short_text']:''?></p>
                        </div>
                        <div class="form-group <?=isset($this->errors['text'])?'has-error':''?>">
                            <label>Полное описание</label>
                            <textarea class="form-control" name="text" rows="10" placeholder="Полное описание акции"><?=$this->action->text?></textarea>
                            <p class="help-block"><?=isset($this->errors['text'])?$this->errors['text']:''?></p>
                        </div>
                        <div class="form-group <?=isset($this->errors['start_at'])?'has-error':''?>">
                            <label>Дата начала:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" value="<?=isset($this->action->name) ? $this->action->start_at : date('d.m.Y')?>" id="start_at" name="start_at" placeholder="Дата начала акции" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div><!-- /.input group -->
                            <p class="help-block"><?=isset($this->errors['start_at'])?$this->errors['start_at']:''?></p>
                        </div>
                        <div class="form-group <?=isset($this->errors['end_at'])?'has-error':''?>">
                            <label>Дата окончания:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="end_at" value="<?=$this->action->end_at?>" name="end_at" placeholder="Дата окончания акции" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div><!-- /.input group -->
                            <p class="help-block"><?=isset($this->errors['end_at'])?$this->errors['end_at']:''?></p>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="forever" <?=$this->action->forever == 1 ? 'checked' : ''?>/>
                                Акция бесконечная
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="visible" <?=!isset($this->action->visible) || $this->action->visible == 1 ? 'checked' : ''?>/>
                                Акция активна
                            </label>
                        </div>
                        <div class="form-group <?=isset($this->errors['main_image'])?'has-error':''?>">
                            <label for="exampleInputFile">Изображение на главной</label>
                            <input type="file" id="main_image" name="main_image" accept="image/*">
                            <p class="help-block"><?=isset($this->errors['main_image'])?$this->errors['main_image']:'Рекомендуется изображение размера 115х115.'?></p>
                            <?php if(!empty($this->action->main_image)):?>
                                <p><img src="<?=\config\App::ACTION_MAIN_IMAGE_DIR.$this->action->main_image?>" alt="main_image"></p>
                            <?php endif;?>
                        </div>
                        <div class="form-group <?=isset($this->errors['detail_image'])?'has-error':''?>">
                            <label for="exampleInputFile">Изображение во всплывающей форме</label>
                            <input type="file" id="detail_image" name="detail_image" accept="image/*">
                            <p class="help-block"><?=isset($this->errors['detail_image'])?$this->errors['detail_image']:'Рекомендуется изображение размера 798х280.'?></p>
                            <?php if(!empty($this->action->detail_image)):?>
                                <p><img src="<?=\config\App::ACTION_DETAIL_IMAGE_DIR.$this->action->detail_image?>" alt="detail_image"></p>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="save">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="/admin/assets/js/actions/create/main.js" type="text/javascript"></script>