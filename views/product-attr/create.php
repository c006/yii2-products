<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAttr */

$this->title                   = Yii::t('app', 'Create Product Attr');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-create">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
            'model'            => $model,
            'model_link_value' => $model_link_value,
    ]) ?>

</div>
