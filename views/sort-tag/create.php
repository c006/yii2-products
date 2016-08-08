<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\SortTag */

$this->title = Yii::t('app', 'Create Sort Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sort Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sort-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
