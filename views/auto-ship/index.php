<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\AutoShip */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Auto Ships');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-ship-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="item-container margin-top-30">
        <?= Html::a(Yii::t('app', 'Create Auto Ship'), ['create'], ['class' => 'btn btn-secondary']) ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>
