<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\SortTagGroups */

$this->title = Yii::t('app', 'Create Sort Tag Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sort Tag Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sort-tag-groups-create">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_link' => $model_link,
    ]) ?>

</div>
