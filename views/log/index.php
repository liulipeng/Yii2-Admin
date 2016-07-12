<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this  yii\web\View */
/* @var $model izyue\admin\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel izyue\admin\models\searchs\BizRule */

$this->title = Yii::t('rbac-admin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            <?=$this->title?>
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">
                <div class="space15"></div>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => [
                        'class' => 'table table-striped table-hover table-bordered',
                        'id' => 'editable-sample',
                    ],
                    'pager' => [
                        'prevPageLabel' => Yii::t('rbac-admin', 'Prev'),
                        'nextPageLabel' => Yii::t('rbac-admin', 'Next'),
                    ],
                    'layout'=> '{items}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="dataTables_info" id="editable-sample_info">{summary}</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dataTables_paginate paging_bootstrap pagination">{pager}</div>
                                    </div>
                                </div>',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'route',
                        'url',
                        [
                            'attribute' => 'admin.username',
                            'filter' => Html::activeTextInput($searchModel, 'admin', [
                                'class' => 'form-control', 'id' => null
                            ]),
                        ],
                        'admin_email',
                        'ip',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}'
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </section>
    <!-- page end-->
</section>