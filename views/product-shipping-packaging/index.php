<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\ProductShippingPackaging */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Product Shipping Packagings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-shipping-packaging-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Shipping Packaging'), ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'shipping_packaging_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
