<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductTypeSectionAttr */

$this->title = Yii::t('app', 'Create Product Type Section Attr');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Type Section Attrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-section-attr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
