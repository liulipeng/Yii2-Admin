<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var izyue\admin\models\AuthItem $model
 */

$this->title = Yii::t('rbac-admin', 'Create Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="wrapper site-min-height">
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</section>