<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace izyue\admin\generators\controller;

use yii\gii\generators\controller\Generator as BaseGenerator;

/**
 * This generator will generate a controller and one or a few action view files.
 *
 * @property array $actionIDs An array of action IDs entered by the user. This property is read-only.
 * @property string $controllerFile The controller class file path. This property is read-only.
 * @property string $controllerID The controller ID. This property is read-only.
 * @property string $controllerNamespace The namespace of the controller class. This property is read-only.
 * @property string $controllerSubPath The controller sub path. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends BaseGenerator
{
    /**
     * @var string the controller class name
     */
    public $controllerClass;
    /**
     * @var string the controller's view path
     */
    public $viewPath;
    /**
     * @var string the base class of the controller
     */
    public $baseClass = 'backend\controllers\Controller';
    /**
     * @var string list of action IDs separated by commas or spaces
     */
    public $actions = 'index';
}
