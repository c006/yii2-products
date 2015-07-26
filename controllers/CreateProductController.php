<?php

namespace c006\products\controllers;

use c006\alerts\Alerts;
use c006\email\EmailTemplates;
use c006\products\models\Products;
use c006\user\models\form\Login as LoginForm;
use c006\user\models\form\PasswordResetRequest as PasswordResetRequestForm;
use c006\user\models\form\Preferences;
use c006\user\models\form\ResetPassword as ResetPasswordForm;
use c006\user\models\form\Signup as SignupForm;
use c006\user\models\User;
use common\assets\AppHelpers;
use common\assets\AssetExtrasJs;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Class IndexController
 *
 * @package c006\products\controllers
 */
class CreateProductController extends Controller
{


    function init()
    {
        $this->layout = '@c006/products/views/layouts/main';
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }


    /**
     *
     */
    public function actionIndex()
    {

        $model = new Products();

        return $this->render('choose-type', ['model' => $model]);

    }


}
