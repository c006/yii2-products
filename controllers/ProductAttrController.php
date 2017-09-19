<?php

namespace c006\products\controllers;

use c006\alerts\Alerts;
use c006\products\assets\ModelHelper;
use c006\products\assets\ProdHelpers;
use c006\products\models\ProductAttr;
use c006\products\models\ProductAttrValue;
use c006\products\models\search\ProductAttr as ProductAttrSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductAttrController implements the CRUD actions for ProductAttr model.
 */
class ProductAttrController extends Controller
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
     * Lists all ProductAttr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new ProductAttrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductAttr model.
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
     * Creates a new ProductAttr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductAttr();

        if (isset($_POST['ProductAttr'])) {

            $model = ModelHelper::saveModelForm('c006\products\models\ProductAttr', $_POST['ProductAttr']);
            self::updateLink($model->id);

            return $this->redirect(['index', 'id' => $model->id]);
        }

        $model_link_value = ProductAttrValue::find()
            ->where(['attr_id' => $model->id])
            ->asArray()
            ->all();

        return $this->render('create', [
            'model'            => $model,
            'model_link_value' => $model_link_value,
        ]);

    }

    /**
     * Updates an existing ProductAttr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (isset($_POST['ProductAttr'])) {

            $_POST['ProductAttr']['id'] = $id;
            $model = ModelHelper::saveModelForm('c006\products\models\ProductAttr', $_POST['ProductAttr']);
            self::updateLink($id);

            Alerts::setAlertType(Alerts::ALERT_INFO);
            Alerts::setCountdown(5);
            Alerts::setMessage("Attribute Updated");

            return $this->redirect(['index', 'id' => $model->id]);
        }

        $model_link_value = ProductAttrValue::find()
            ->where(['attr_id' => $id])
            ->asArray()
            ->all();

        return $this->render('update', [
            'model'            => $model,
            'model_link_value' => $model_link_value,
        ]);

    }

    /**
     * Deletes an existing ProductAttr model.
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
     * Finds the ProductAttr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ProductAttr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductAttr::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    private function updateLink($model_id)
    {
        $array_remove = [];
        if (isset($_POST['ModelLinkValue'])) {

            foreach ($_POST['ModelLinkValue'] as $i => $item) {
                if (!isset($item['id'])) {
                    $model          = ModelHelper::saveModelForm('c006\products\models\ProductAttrValue',
                        ['attr_id'  => $model_id,
                         'name'     => $item['name'],
                         'value'    => $item['value'],
                         'position' => $i,
                        ]);
                    $array_remove[] = $model->id;
                } else {
                    ModelHelper::saveModelForm('c006\products\models\ProductAttrValue',
                        ['attr_id'  => $model_id,
                         'name'     => $item['name'],
                         'value'    => $item['value'],
                         'position' => $i,
                         'id'       => $item['id'],
                        ]);
                    $array_remove[] = $item['id'];
                }
            }
            ProductAttrValue::deleteAll("attr_id = " . $model_id . " AND id NOT IN (" . join(",", $array_remove) . ")");
        }
    }


}
