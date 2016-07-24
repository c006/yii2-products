<?php

namespace c006\products\controllers;

use c006\products\assets\ModelHelper;
use c006\products\models\AutoShip;
use c006\products\models\AutoShipLink;
use c006\products\models\search\AutoShip as AutoShipSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AutoShipController implements the CRUD actions for AutoShip model.
 */
class AutoShipController extends Controller
{

    public $weeks = [];

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
     * Lists all AutoShip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new AutoShipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AutoShip model.
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
     * Creates a new AutoShip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model      = new AutoShip();
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
     * Updates an existing AutoShip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model      = $this->findModel($id);
        $model_link = AutoShipLink::find()
            ->where(['auto_ship_id' => $id])
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
     * Deletes an existing AutoShip model.
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
     * Finds the AutoShip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AutoShip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AutoShip::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $model_id
     */
    private function updateLink($model_id)
    {
        $array_remove = [];
        if (isset($_POST['AutoShipLink'])) {

            foreach ($_POST['AutoShipLink'] as $i => $item) {
                if (!isset($item['id'])) {
                    $model          = ModelHelper::saveModelForm('c006\products\models\AutoShipLink',
                        ['auto_ship_id' => $model_id,
                         'duration'     => $item['duration'],
                         'type'         => $item['type'],
                         'position'     => $i,
                        ]);
                    $array_remove[] = $model->id;
                } else {
                    ModelHelper::saveModelForm('c006\products\models\AutoShipLink',
                        ['auto_ship_id' => $model_id,
                         'duration'     => $item['duration'],
                         'type'         => $item['type'],
                         'position'     => $i,
                         'id'           => $item['id'],
                        ]);
                    $array_remove[] = $item['id'];
                }
            }
            AutoShipLink::deleteAll("auto_ship_id = " . $model_id . " AND id NOT IN (" . join(",", $array_remove) . ")");
        }
    }
}
