<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace izyue\admin\generators\crud;

use yii\gii\generators\crud\Generator as BaseGenerator;

/**
 * Generates CRUD
 *
 * @property array $columnNames Model column names. This property is read-only.
 * @property string $controllerID The controller ID (without the module ID prefix). This property is
 * read-only.
 * @property string $nameAttribute This property is read-only.
 * @property array $searchAttributes Searchable attributes. This property is read-only.
 * @property bool|\yii\db\TableSchema $tableSchema This property is read-only.
 * @property string $viewPath The controller view path. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends BaseGenerator
{
    public $modelClass = 'backend\models\\';
    public $controllerClass = 'backend\controllers\\';
    public $viewPath;
    public $baseControllerClass = 'backend\controllers\Controller';
    public $indexWidgetType = 'grid';
    public $searchModelClass = 'backend\models\searchs\\';
}
