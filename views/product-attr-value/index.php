<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\ProductAttrValue */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Product Attr Values');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Attr Value'), ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'attr_id',
            'name',
            'value',
            'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
