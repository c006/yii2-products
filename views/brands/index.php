<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\Brands */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Brands');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brands-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="item-container margin-top-30">

        <?= Html::a(Yii::t('app', 'Create Brands'), ['create'], ['class' => 'btn btn-primary']) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',

                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '<div class="nowrap">{update} {delete}</div>',
                ],
            ],
        ]); ?>
    </div>
</div>
