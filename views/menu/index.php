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

$this->registerCssFile("@web/statics/assets/fuelux/css/tree-style.css");
$this->registerJsFile("@web/statics/assets/fuelux/js/tree.min.js", ['depends'=>'backend\assets\AppAsset']);

$this->registerJs($this->render('@app/web/statics/js/tree.js', ['web' => Yii::getAlias('@web')]));

$this->registerJs("
      jQuery(document).ready(function() {
          TreeView.init();
      });
");

?>

<section class="wrapper site-min-height">

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
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
