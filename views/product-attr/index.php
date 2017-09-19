<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\ProductAttr */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Product Attrs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Attr'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'attr_type_id',
                    'label',
                    'name',
                    'default_value:ntext',
                    // 'is_unique_value',
                    // 'css_style',
                    // 'hint:ntext',
                    // 'is_core',
                    // 'is_required',

                    ['class'    => 'yii\grid\ActionColumn',
                     'template' => '<span class="nowrap">{update} {delete}</span>',
                    ],
            ],
    ]); ?>

</div>
