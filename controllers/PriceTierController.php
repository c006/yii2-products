<?php

namespace c006\products\controllers;

use c006\products\assets\ModelHelper;
use c006\products\assets\ProdHelpers;
use c006\products\models\PriceTier;
use c006\products\models\PriceTierLink;
use c006\products\models\search\PriceTier as PriceTierSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PriceTierController implements the CRUD actions for PriceTier model.
 */
class PriceTierController extends Controller
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
     * Lists all PriceTier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new PriceTierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PriceTier model.
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
     * Creates a new PriceTier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model      = new PriceTier();
        $model_link = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            self::updateLink($model->id);

            return $this->redirect(['index', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model'      => $model,
                'model_link' => $model_link,
            ]);
        }
    }

    /**
     * Updates an existing PriceTier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model      = $this->findModel($id);
        $model_link = PriceTierLink::find()
            ->where(['price_tier_id' => $id])
            ->orderBy('position')
            ->asArray()
            ->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            self::updateLink($model->id);

            return $this->redirect(['index', 'id' => $model->id]);
        } else {

            return $this->render('update', [
                'model'      => $model,
                'model_link' => $model_link,
            ]);
        }
    }

    /**
     * @param $model_id
     */
    private function updateLink($model_id)
    {
        if (isset($_POST['PriceTierLink'])) {
            $array_keep = [];
            foreach ($_POST['PriceTierLink'] as $index => $item) {
                $model        = ModelHelper::saveModelForm('c006\products\models\PriceTierLink',
                    ['id'            => $item['id'],
                     'price_tier_id' => $model_id,
                     'price'         => $item['price'],
                     'max_qty'       => $item['max_qty'],
                     'is_percentage' => $item['is_percentage'],
                     'position'      => $index,
                    ]);
                $array_keep[] = $model->id;
            }
            PriceTierLink::deleteAll("price_tier_id = " . $model_id . " AND id NOT IN (" . join(",", $array_keep) . ")");
        }
    }

    /**
     * Deletes an existing PriceTier model.
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
     * Finds the PriceTier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return PriceTier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PriceTier::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
