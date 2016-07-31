<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAttr */
/* @var $model_link_value array */

$this->title                   = Yii::t('app', 'Update {modelClass}: ', [
                'modelClass' => 'Product Attr',
        ]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-attr-update">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
            'model'            => $model,
            'model_link_value' => $model_link_value,
    ]) ?>

</div>
