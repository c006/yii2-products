<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\ProductAttrProductTypeLink */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Product Attr Product Type Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-product-type-link-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Attr Product Type Link'), ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'attr_id',
            'product_core_type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
