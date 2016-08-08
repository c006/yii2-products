<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\SortTagGroups */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sort Tag Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sort-tag-groups-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="item-container margin-top-20">

        <?= Html::a(Yii::t('app', 'Create Sort Tag Groups'), ['create'], ['class' => 'btn btn-secondary']) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',

                ['class'         => 'yii\grid\ActionColumn'
                    , 'template' => '<div class="nowrap"> {update} {delete} </div>'
                ],
            ],
        ]); ?>
    </div>
</div>
