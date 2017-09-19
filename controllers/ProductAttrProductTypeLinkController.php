<?php

namespace c006\products\controllers;

use c006\products\assets\ProdHelpers;
use c006\products\models\ProductAttrProductTypeLink;
use c006\products\models\search\ProductAttrProductTypeLink as ProductAttrProductTypeLinkSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductAttrProductTypeLinkController implements the CRUD actions for ProductAttrProductTypeLink model.
 */
class ProductAttrProductTypeLinkController extends Controller
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
     * Lists all ProductAttrProductTypeLink models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new ProductAttrProductTypeLinkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductAttrProductTypeLink model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductAttrProductTypeLink model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductAttrProductTypeLink();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductAttrProductTypeLink model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductAttrProductTypeLink model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductAttrProductTypeLink model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductAttrProductTypeLink the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductAttrProductTypeLink::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
