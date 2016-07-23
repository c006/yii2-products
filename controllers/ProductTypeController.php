<?php

namespace c006\products\controllers;

use c006\alerts\Alerts;
use c006\products\assets\AssetJqueyUi;
use c006\products\assets\AttrHelper;
use c006\products\assets\FormHelper;
use c006\products\assets\ModelHelper;
use c006\products\assets\ProdHelpers;

use c006\products\models\ProductTypeSection;
use c006\products\models\ProductTypeSectionAttr;
use Yii;
use c006\products\models\ProductType;
use c006\products\models\search\ProductType as ProductTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductTypeController implements the CRUD actions for ProductType model.
 */
class ProductTypeController extends Controller
{

    function init()
    {
        //$this->layout = '@c006/products/views/layouts/main';
        if (ProdHelpers::checkLogin() && ProdHelpers::isGuest()) {
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
     * Lists all ProductType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductType model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductType();

        if (isset($_POST['Sections'])) {

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->save();
                AttrHelper::updateAttributeSections($_POST['Sections'], $model->id);
                FormHelper::createProductTypeForm($model->id);

                Alerts::setMessage('Created successfully');
                Alerts::setAlertType(Alerts::ALERT_SUCCESS);
                Alerts::setCountdown(4);

                return $this->redirect(['index']);
            }

        }
        if (isset($_POST['ProductType'])) {

            $model->product_core_type_id = $_POST['ProductType']['product_core_type_id'];

            return $this->render('choose-type-attr', [
                'model' => $model,
            ]);
        }

        return $this->render('choose-type', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing ProductType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (isset($_POST['Sections'])) {

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->save();
                AttrHelper::updateAttributeSections($_POST['Sections'], $model->id);
                FormHelper::createProductTypeForm($id);

                Alerts::setMessage('Updated successfully');
                Alerts::setAlertType(Alerts::ALERT_SUCCESS);
                Alerts::setCountdown(4);

                return $this->redirect(['index']);
            } else {
                Alerts::setMessage('Error, please try again');
                Alerts::setAlertType(Alerts::ALERT_DANGER);
                Alerts::setCountdown(4);
            }
        }

        return $this->render('choose-type-attr', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ProductType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductType::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
