<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use izyue\admin\components\RouteRule;

/* @var $this yii\web\View */
/* @var $model izyue\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
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
                        'maxlength' => 64,
                        'class' => 'form-control',
                    ]) ?>

                    <?= $form->field($model, 'description', [
                        'labelOptions' => ['class'=>'col-lg-2 control-label'],
                        'template' => '
                            {label}
                            <div class="col-lg-10">
                            {input}
                            {error}
                            </div>
                            ',
                    ])->textarea([
                        'rows' => 2,
                        'class' => 'form-control',
                    ]) ?>

                    <?= $form->field($model, 'ruleName', [
                        'labelOptions' => ['class'=>'col-lg-2 control-label'],
                        'template' => '
                            {label}
                            <div class="col-lg-10">
                            {input}
                            {error}
                            </div>
                            ',
                    ])->textInput([
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
