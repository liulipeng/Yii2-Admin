<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form backend\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <?= "<?= " ?>Html::encode($this->title) ?>
            </header>
            <div class="panel-body">
                <?= "<?php " ?>$form = ActiveForm::begin(); ?>
<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "                    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                <?= "<?php " ?>ActiveForm::end(); ?>
            </div>
        </section>
    </div>
</div>
