<?php

namespace c006\products\controllers;

use c006\products\assets\ModelHelper;
use c006\products\models\SortTag;
use Yii;
use c006\products\models\SortTagGroups;
use c006\products\models\search\SortTagGroups as SortTagGroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SortTagGroupsController implements the CRUD actions for SortTagGroups model.
 */
class SortTagGroupsController extends Controller
{
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
     * Lists all SortTagGroups models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SortTagGroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SortTagGroups model.
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
     * Creates a new SortTagGroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SortTagGroups();
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
     * Updates an existing SortTagGroups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_link = SortTag::find()
            ->where(['sort_tag_group_id' => $id])
            ->orderBy(" name ")
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


    private function updateLink($model_id)
    {
        if (isset($_POST['ModelLink'])) {
            $array_keep = [];
            foreach ($_POST['ModelLink'] as $index => $item) {
                $model = ModelHelper::saveModelForm('c006\products\models\SortTag',
                    ['id'                => $item['id'],
                     'sort_tag_group_id' => $model_id,
                     'name'              => $item['name'],
                    ]);
                $array_keep[] = $model->id;
            }
            SortTag::deleteAll(" sort_tag_group_id = " . $model_id . " AND id NOT IN (" . join(",", $array_keep) . ") ");
        }
    }

    /**
     * Deletes an existing SortTagGroups model.
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
     * Finds the SortTagGroups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SortTagGroups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SortTagGroups::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
