<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use izyue\admin\models\Menu;
use yii\helpers\Json;
use izyue\admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model izyue\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
        'menu_source' => Menu::find()->select(['name'])->column(),
        'route_source' => Menu::getSavedRoutes(),
    ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
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

                <?= $form->field($model, 'name', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'maxlength' => 128,
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'parent_name', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'id' => 'parent_name',
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'route', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'id' => 'route',
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'order', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'type' => 'number',
                    'id' => 'rule-name',
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'data', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textarea([
                    'rows' => 6,
                    'class' => 'form-control',
                ]) ?>


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