<?php
/**
 * Created by PhpStorm.
 * User: liulipeng
 * Date: 2018/4/3
 * Time: 下午11:43
 */

namespace izyue\admin\widgets;


use yii\grid\GridView as BaseGridView;


class GridView extends BaseGridView
{
    public $tableOptions = [
        'class' => 'table table-striped table-hover table-bordered',
    ];
    public $layout = '{items}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dataTables_info">{summary}</div>
                            </div>
                            <div class="col-lg-6">
                                {pager}
                            </div>
                        </div>';
    public $pager = [
        'options'=>[
            'class' => 'dataTables_paginate paging_bootstrap pagination',
            'style' => 'margin: 0'
        ],
    ];
}