<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\PriceTier */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Price Tiers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-tier-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="item-container margin-top-30">
        <?= Html::a(Yii::t('app', 'Create Price Tier'), ['create'], ['class' => 'btn btn-secondary']) ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name',
                'active',
                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>
</div>
