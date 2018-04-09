<?php
/**
 * Created by PhpStorm.
 * User: liulipeng
 * Date: 2018/4/4
 * Time: 上午9:35
 */

namespace izyue\admin\widgets;


use yii\widgets\ActiveForm as BaseActiveForm;

class ActiveForm extends BaseActiveForm
{
    public $options = [
        'class' => 'form-horizontal',
    ];

    public $fieldConfig = [
        'labelOptions' => [
            'class' => 'col-lg-2 control-label',
        ],
        'inputOptions' => [
            'class' => 'form-control',
        ],
        'template' => '
                            {label}
                            <div class="col-lg-10">
                            {input}
                            {error}
                            </div>
                            ',
    ];

}