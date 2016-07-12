<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var izyue\admin\models\AuthItem $model
 */
$this->title = '查看操作日志';
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="wrapper site-min-height">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <?=$this->title?>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-11">
                            <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'route',
                                    'url',
                                    'user_agent',
                                    'gets:ntext',
                                    'posts:ntext',
                                    'admin_email',
                                    'updated_at',
                                    'created_at',
                                ],
                                'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>'
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</section>