<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use izyue\admin\components\MenuHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel izyue\admin\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile("/statics/assets/fuelux/css/tree-style.css");
$this->registerJsFile("/statics/assets/fuelux/js/tree.min.js", ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile("/statics/js/tree.js", ['depends'=>'backend\assets\AppAsset']);

$this->registerJs("
      jQuery(document).ready(function() {
          TreeView.init();
      });
");

//$menuRows = MenuHelper::getAssignedMenu(Yii::$app->user->id);
//print_r($menuRows);
//die;

?>

<section class="wrapper site-min-height">

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
<!--        <div class="col-md-6">-->
<!--            <div class="panel">-->
<!--                <div class="panel-heading">-->
<!--                    Tree Style #3-->
<!--                          <span class="tools pull-right">-->
<!--                                <a href="javascript:;" class="fa fa-chevron-down"></a>-->
<!--                                <a href="javascript:;" class="fa fa-times"></a>-->
<!--                            </span>-->
<!--                </div>-->
<!--                <div class="panel-body">-->
<!--                    <div id="FlatTree3" class="tree tree-plus-minus tree-solid-line tree-unselectable">-->
<!--                        <div class = "tree-folder" style="display:none;">-->
<!--                            <div class="tree-folder-header">-->
<!--                                <i class="fa fa-folder"></i>-->
<!--                                <div class="tree-folder-name"></div>-->
<!--                            </div>-->
<!--                            <div class="tree-folder-content"></div>-->
<!--                            <div class="tree-loader" style="display:none"></div>-->
<!--                        </div>-->
<!--                        <div class="tree-item" style="display:none;">-->
<!--                            <i class="tree-dot"></i>-->
<!--                            <div class="tree-item-name"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <?=$this->title?>
                          <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                            </span>
                </div>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <?= Html::a(Yii::t('rbac-admin', 'Create Menu').' <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom:15px;']) ?>
                        </div>
                    </div>
                    <div id="FlatTree4" class="tree tree-solid-line">
                        <div class = "tree-folder" style="display:none;">
                            <div class="tree-folder-header">
                                <i class="fa fa-folder"></i>
                                <div class="tree-folder-name"></div>
                            </div>
                            <div class="tree-folder-content"></div>
                            <div class="tree-loader" style="display:none"></div>
                        </div>
                        <div class="tree-item" style="display:none;">
                            <i class="tree-dot"></i>
                            <div class="tree-item-name"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END PAGE CONTENT-->
</section>

<!--
<section class="wrapper site-min-height">
    <! -- page start-- >
    <section class="panel">
        <header class="panel-heading">
            <?=$this->title?>
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <?= Html::a(Yii::t('rbac-admin', 'Create Menu').' <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom:15px;']) ?>
                    </div>
                </div>
                <div class="space15"></div>
                <?php Pjax::begin(); ?>
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
                        'name',
                        [
                            'attribute' => 'menuParent.name',
                            'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                                'class' => 'form-control', 'id' => null
                            ]),
                            'label' => Yii::t('rbac-admin', 'Parent'),
                        ],
                        'route',
                        'order',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ])
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </section>
<! -- page end-- >
</section>
-->