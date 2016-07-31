<?php
use c006\products\assets\ProdHelpers;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\AttrProdModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>


<h1 class="title-large">Products</h1>

<div class="item-container margin-top-30">

    <?= Html::a(Yii::t('app', 'Create Product'), ['create-product/index'], ['class' => 'btn btn-primary']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'product_type_id',
                'value'     => 'productType.name',
            ],
            [
                'label'  => 'Image',
                'format' => 'raw',
                'value'  => function ($data) {
                    $image = ProdHelpers::getProductImage($data['id'], 'sml');
                    $url = Yii::$app->params['frontend'] . "/images/products/" . $image['file'];

                    return Html::img($url, ['height' => 50]);
                },
            ],
            [
                'label'  => 'Name',
                'format' => 'raw',
                'value'  => function ($data) {
                    return ProdHelpers::getProduct($data['id'])['core_name'];
                },
            ],
            [
                'label'  => 'Price',
                'format' => 'raw',
                'value'  => function ($data) {
                    return ProdHelpers::getProduct($data['id'])['core_price'];
                },
            ],
            [
                'label'  => 'Qty',
                'format' => 'raw',
                'value'  => function ($data) {
                    return ProdHelpers::getProduct($data['id'])['core_qty'];
                },
            ],
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '<span class="nowrap">{view} {update} {delete}</span>',
            ],
        ],
    ]); ?>

</div>

