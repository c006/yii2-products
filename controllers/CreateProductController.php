<?php

namespace c006\products\controllers;

use c006\products\models\Product;
use c006\products\models\ProductType;
use c006\user\models\form\Login as LoginForm;
use c006\user\models\form\PasswordResetRequest as PasswordResetRequestForm;
use c006\user\models\form\ResetPassword as ResetPasswordForm;
use c006\user\models\form\Signup as SignupForm;
use c006\user\models\User;
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

        $model = new Product();

        if (isset($_POST['Product'])) {
            $model->product_type_id = $_POST['Product']['product_type_id'];

            $model_product_type = ProductType::find()
                ->where(['id' => $model->product_type_id])
                ->asArray()
                ->one();

            return $this->render('choose-type-attr', ['model' => $model, 'model_product_type' => $model_product_type]);
        }

        return $this->render('choose-type', ['model' => $model]);

    }


}
