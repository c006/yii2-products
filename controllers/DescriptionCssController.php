<?php

namespace c006\products\controllers;

use c006\alerts\Alerts;
use c006\core\assets\CoreHelper;
use c006\products\assets\ProdHelpers;
use c006\products\models\form\DescriptionCss;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DescriptionCssController implements the CRUD actions for DescriptionCss model.
 */
class DescriptionCssController extends Controller
{

    function init()
    {
        //$this->layout = '@c006/products/views/layouts/main';
        if (ProdHelpers::checkLogin()) {
            return $this->redirect('/user');
        }
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all DescriptionCss models.
     * @return mixed
     */
    public function actionIndex()
    {
        $css = '';
        $model = new DescriptionCss();
        $file = \Yii::getAlias('@frontend') . '/runtime/data/description-css.txt';
        if (file_exists($file) == FALSE) {
            file_put_contents($file, '');
        }

        if (isset($_POST['DescriptionCss'])) {
            file_put_contents($file, $_POST['DescriptionCss']);

            Alerts::setMessage('Description CSS has been updated');
            Alerts::setAlertType(Alerts::ALERT_INFO);
            Alerts::setCountdown(5);

            return $this->redirect('/dashboard');
        }

        $model->css = CoreHelper::cleanCss(file_get_contents($file));


        return $this->render('update', [
            'css'   => $css,
            'model' => $model,
        ]);
    }


}
