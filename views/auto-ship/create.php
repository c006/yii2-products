<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\AutoShip */

$this->title                   = Yii::t('app', 'Create Auto Ship');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Ships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-ship-create">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'      => $model,
        'model_link' => $model_link,
    ]) ?>

</div>
