<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAttrValue */

$this->title                   = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attr Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-value-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method'  => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'attr_id',
            'name',
            'value',
            'position',
        ],
    ]) ?>

</div>
