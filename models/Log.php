<?php

namespace izyue\admin\models;


use yii;
use izyue\admin\components\Configs;
use yii\base\Action;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "admin_log".
 *
 * @property integer $id admin_log id(autoincrement)
 * @property string $name admin_log controller
 * @since 1.0
 */
class Log extends ActiveRecord
{

    public $userClassName;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->userClassName === null) {
            $this->userClassName = Yii::$app->getUser()->identityClass;
            $this->userClassName = $this->userClassName ? : 'common\models\User';
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route', 'url', 'user_agent', 'admin_email', 'ip'], 'string', 'min' => 0, 'max' => 255],
            [['admin_id', 'route', 'url'], 'required'],
            [['admin_id'], 'integer', 'min' => 0, 'max' => 2147483647],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            yii\behaviors\TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->adminLogTable;
    }

    /**
     * @param $action Action
     */
    public static function addLog($action)
    {
        $model = new Log();

        $model->route = $action->uniqueId;
        $model->url = Yii::$app->request->absoluteUrl;

        $headers = Yii::$app->request->headers;

        if ($headers->has('User-Agent')) {
            $model->user_agent =  $headers->get('User-Agent');
        }

        $model->gets = json_encode(Yii::$app->request->get());
        $model->posts = json_encode(Yii::$app->request->post());
        $model->admin_id = Yii::$app->user->identity['id'];
        $model->admin_email = Yii::$app->user->identity['email'];
        $model->ip = Yii::$app->request->userIP;

        $model->save();

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'route' => Yii::t('rbac-admin', 'Route'),
            'url' => Yii::t('rbac-admin', 'Url'),
            'admin' => Yii::t('rbac-admin', 'User'),
            'admin_email' => Yii::t('rbac-admin', 'Email'),
            'ip' => Yii::t('rbac-admin', 'Ip'),
            'user_agent' => Yii::t('rbac-admin', 'User Agent'),
            'updated_at' => Yii::t('rbac-admin', 'Updated At'),
            'created_at' => Yii::t('rbac-admin', 'Created At'),
        ];
    }

    /**
     * Get admin name
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        $model = new $this->userClassName;
        return $this->hasOne($model::className(), ['id' => 'admin_id']);
    }



}