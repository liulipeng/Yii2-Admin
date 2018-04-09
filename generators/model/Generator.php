<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace izyue\admin\generators\model;

use yii\gii\generators\model\Generator as BaseGenerator;

/**
 * This generator will generate one or multiple ActiveRecord classes for the specified database table.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends BaseGenerator
{
    public $db = 'db';
    public $ns = 'backend\models';
    public $tableName;
    public $modelClass;
    public $baseClass = 'common\models\base\BaseModel';
    public $generateRelations = self::RELATIONS_ALL;
    public $generateRelationsFromCurrentSchema = true;
    public $generateLabelsFromComments = false;
    public $useTablePrefix = false;
    public $useSchemaName = true;
    public $generateQuery = false;
    public $queryNs = 'backend\models';
    public $queryClass;
    public $queryBaseClass = 'yii\db\ActiveQuery';
}
