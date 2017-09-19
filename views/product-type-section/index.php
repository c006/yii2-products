<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\ProductTypeSection */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Product Type Sections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Type Section'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_type_id',
            'name',
            'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
