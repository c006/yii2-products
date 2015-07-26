<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductValueEncrypted */

$this->title = Yii::t('app', 'Create Product Value Encrypted');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Value Encrypteds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-value-encrypted-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
