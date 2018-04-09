<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace izyue\admin\generators\form;

use yii\gii\generators\form\Generator as BaseGenerator;

/**
 * This generator will generate an action view file based on the specified model class.
 *
 * @property array $modelAttributes List of safe attributes of [[modelClass]]. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends BaseGenerator
{
    public $modelClass;
    public $viewPath = '@app/views';
    public $viewName;
    public $scenarioName;
}
