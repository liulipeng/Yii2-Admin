RBAC Manager for Yii 2
======================

需要依赖这个[项目](https://github.com/liulipeng/Yii2-Project-Admin)来安装Admin, 详情请查阅 [https://github.com/liulipeng/Yii2-Project-Admin](https://github.com/liulipeng/Yii2-Project-Admin)

[![Latest Stable Version](https://poser.pugx.org/izyue/yii2-admin/v/stable)](https://packagist.org/packages/izyue/yii2-admin)
[![Total Downloads](https://poser.pugx.org/izyue/yii2-admin/downloads)](https://packagist.org/packages/izyue/yii2-admin)
[![License](https://poser.pugx.org/izyue/yii2-admin/license)](https://packagist.org/packages/izyue/yii2-admin)
[![Daily Downloads](https://poser.pugx.org/izyue/yii2-admin/d/daily)](https://packagist.org/packages/izyue/yii2-admin)

### 功能

1. 基础功能：登录，登出，密码修改等常见的功能

2. 菜单配置：可视化配置菜单，可以根据配置用户的权限显示隐藏菜单

3. 权限机制：角色、权限增删改查，以及给用户赋予角色权限

4. 规则机制：除了权限角色之外有规则机制，即可以给对应的权限配置规则

5. 二次开发：完全可以基于该系统做二次开发，开发一套适合自己的后台管理系统，节约权限控制以及部分基础功能开发的时间成本，后台系统开发的不二之选

6. 持续更新：新的功能模块会持续更新，请关注

### 安装

最简单的安装，请访问[这里](https://github.com/liulipeng/Yii2-Project-Admin)查看

### 预览

#### 登录

![](http://www.izyue.com/yii2-admin/index/1.jpg)

#### 首页

![](http://www.izyue.com/yii2-admin/index/2.jpg)

#### 权限管理

![](http://www.izyue.com/yii2-admin/index/3.jpg)

#### 角色管理

![](http://www.izyue.com/yii2-admin/index/4.jpg)

#### 路由管理

![](http://www.izyue.com/yii2-admin/index/5.jpg)

#### 菜单管理

![](http://www.izyue.com/yii2-admin/index/6.jpg)


### Install With Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require izyue/yii2-admin "*"
```

or for the dev-master

```
php composer.phar require izyue/yii2-admin "dev"
```

Or, you may add

```
"izyue/yii2-admin": "*"
```

to the require section of your `composer.json` file and execute `php composer.phar update`.

### Install From the Archive

Download the latest release from here [releases](https://github.com/mdmsoft/yii2-admin/releases), then extract it to your project.
In your application config, add the path alias for this extension.

```php
return [
    ...
    'aliases' => [
        '@izyue/admin' => 'path/to/your/extracted',
        // for example: '@izyue/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
        ...
    ]
];
```

Usage
-----

Once the extension is installed, simply modify your application configuration as follows:

```php
return [
    'modules' => [
        'admin' => [
            'class' => 'izyue\admin\Module',
            ...
        ]
        ...
    ],
    ...
    'components' => [
        ...
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
        ]
    ],
    'as access' => [
        'class' => 'izyue\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
];
```
See [Yii RBAC](http://www.yiiframework.com/doc-2.0/guide-security-authorization.html#role-based-access-control-rbac) for more detail.
You can then access Auth manager through the following URL:

```
http://localhost/path/to/index.php?r=admin
http://localhost/path/to/index.php?r=admin/route
http://localhost/path/to/index.php?r=admin/permission
http://localhost/path/to/index.php?r=admin/menu
http://localhost/path/to/index.php?r=admin/role
http://localhost/path/to/index.php?r=admin/assignment
```

To use the menu manager (optional), execute the migration here:
```
yii migrate --migrationPath=@izyue/admin/migrations
```

If you use database (class 'yii\rbac\DbManager') to save rbac data, execute the migration here:
```
yii migrate --migrationPath=@yii/rbac/migrations
```

Customizing Assignment Controller
---------------------------------

Assignment controller properties may need to be adjusted to the User model of your app.
To do that, change them via `controllerMap` property. For example:

```php
    'modules' => [
        'admin' => [
            ...
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'izyue\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'user_id',
                    'usernameField' => 'username',
                    'fullnameField' => 'profile.full_name',
                    'extraColumns' => [
                        [
                            'attribute' => 'full_name',
                            'label' => 'Full Name',
                            'value' => function($model, $key, $index, $column) {
                                return $model->profile->full_name;
                            },
                        ],
                        [
                            'attribute' => 'dept_name',
                            'label' => 'Department',
                            'value' => function($model, $key, $index, $column) {
                                return $model->profile->dept->name;
                            },
                        ],
                        [
                            'attribute' => 'post_name',
                            'label' => 'Post',
                            'value' => function($model, $key, $index, $column) {
                                return $model->profile->post->name;
                            },
                        ],
                    ],
                    'searchClass' => 'app\models\UserSearch'
                ],
            ],
            ...
        ]
        ...
    ],

```

- Required properties
    - **userClassName** Fully qualified class name of your User model  
        Usually you don't need to specify it explicitly, since the module will detect it automatically
    - **idField** ID field of your User model  
        The field that corresponds to Yii::$app->user->id.  
        The default value is 'id'.
    - **usernameField** User name field of your User model  
        The default value is 'username'.
- Optional properties
    - **fullnameField** The field that specifies the full name of the user used in "view" page.  
        This can either be a field of the user model or of a related model (e.g. profile model).  
        When the field is of a related model, the name should be specified with a dot-separated notation (e.g. 'profile.full_name').  
        The default value is null.
    - **extraColumns** The definition of the extra columns used in the "index" page  
        This should be an array of the definitions of the grid view columns.  
        You may include the attributes of the related models as you see in the example above.  
        The default value is an empty array.
    - **searchClass** Fully qualified class name of your model for searching the user model  
        You have to supply the proper search model in order to enable the filtering and the sorting by the extra columns.  
        The default value is null.


Customizing Layout
------------------

By default, the admin module will use the layout specified in the application level.
In that case you have to write the menu for this module on your own.

By specifying the `layout` property, you can use one of the built-in layouts of the module:
'left-menu', 'right-menu' or 'top-menu', all equipped with the menu for this module.

```php
    'modules' => [
        'admin' => [
            ...
            'layout' => 'left-menu', // defaults to null, using the application's layout without the menu
                                     // other avaliable values are 'right-menu' and 'top-menu'
        ],
        ...
    ],
```

If you use one of them, you can also customize the menu. You can change menu label or disable it.

```php
    'modules' => [
        'admin' => [
            ...
            'layout' => 'left-menu',
            'menus' => [
                'assignment' => [
                    'label' => 'Grant Access' // change label
                ],
                'route' => null, // disable menu
            ],
        ],
        ...
    ],
```

While using a dedicated layout of the module, you may still want to have it wrapped in your application's main layout
that has your application's nav bar and your brand logo on it.
You can do it by specifying the `mainLayout` property with the application's main layout. For example:

```php
    'modules' => [
        'admin' => [
            ...
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            ...
        ],
        ...
    ],
```

[screenshots](https://picasaweb.google.com/105012704576561549351/Yii2Admin?authuser=0&feat=directlink)
