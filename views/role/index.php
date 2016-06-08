<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel izyue\admin\models\AuthItemSearch */

$this->title = Yii::t('rbac-admin', 'Roles');
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
                <div class="clearfix">
                    <div class="btn-group">
                        <?= Html::a(Yii::t('rbac-admin', 'Create Role').' <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom:15px;']) ?>
                    </div>
                </div>
                <div class="space15"></div>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => [
                        'class' => 'table table-striped table-hover table-bordered',
                        'id' => 'editable-sample',
                    ],
                    'pager'=>array(              //通过pager设置样式   默认为CLinkPager
                        'prevPageLabel' => Yii::t('rbac-admin', 'Prev'),
//                            'firstPageLabel'=>'首页',  //first,last 在默认样式中为{display:none}及不显示，通过样式{display:inline}即可
                        'nextPageLabel' => Yii::t('rbac-admin', 'Next'),
//                            'lastPageLabel'=>'末页',
//                            'header'=>'',
                        'options'=>[
                            'class' => '',
//                            'style' => 'float: right;'
                        ],
                    ),
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
                        [
                            'attribute' => 'name',
                            'label' => Yii::t('rbac-admin', 'Name'),
                        ],
                        [
                            'attribute' => 'description',
                            'label' => Yii::t('rbac-admin', 'Description'),
                        ],
                        ['class' => 'yii\grid\ActionColumn',],
                    ],
                ])
                ?>
            </div>
        </div>
    </section>
    <!-- page end-->
</section>
