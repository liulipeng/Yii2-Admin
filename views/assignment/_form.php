<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\widgets\images\Images;
use yii\helpers\Json;
use izyue\admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model izyue\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */

$js = <<<JS
    $("#de_id").change(function() {
        var departId = $("#de_id").val();
        $('#jkht_form_ch').val(departId);
    })
JS;
$this->registerJs($js);

$css = <<<CSS
    #jkht_form_ch{
        display: none;
    }
CSS;
$this->registerCss($css);


?>

<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <?=$this->title?>
            </header>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'options'=>[
                        'class'=>'form-horizontal'
                    ]
                ]); ?>

                <?= $form->field($model, 'username', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                            {label}
                            <div class="col-lg-10">
                            {input}
                            {error}
                            </div>
                            ',
                ])->textInput([
                    'maxlength' => 64,
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'email', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                            {label}
                            <div class="col-lg-10">
                            {input}
                            {error}
                            </div>
                            ',
                ])->textInput([
                    'type' => 'email',
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'password', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                            {label}
                            <div class="col-lg-10">
                            {input}
                            {error}
                            </div>
                            ',
                ])->passwordInput([
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'headPortrait')->widget('\common\widgets\images\Images',
                    ['saveDB' => 1, 'type' => Images::TYPE_IMAGE,'url'=>\yii\helpers\Url::to('/public/uploadimage')])->label(false); ?>

                <select name="" id="de_id">
                    <option value="">请选择部门（销售必选，其他可以不选）</option>
                    <?php foreach ($data as $val){?>
                        <option value="<?= $val['id'] ;?>"><?=  str_repeat("--",$val['level']*3).$val['position']?></option>
                    <?php }?>
                </select>

                <?= $form->field($model, 'partmentId')->input('text', ['id' => 'jkht_form_ch', 'class' => ' form-control'])->label(false); ?>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php
                        echo Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
                            'class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger'])
                        ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </section>
    </div>
</div>