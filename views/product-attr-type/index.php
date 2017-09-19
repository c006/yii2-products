<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\ProductAttrType */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Product Attr Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Attr Type'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'element',
            'type',
            'description:ntext',
            // 'value_table',
            // 'column',
            // 'value_type',
            // 'is_visible',
            // 'show_in_admin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
