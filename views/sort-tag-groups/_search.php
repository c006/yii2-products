<?php

use yii\helpers\Html;
use c006\activeForm\ActiveForm;

/* @var $this yii\web\View */
/* @var $model c006\products\models\search\SortTagGroups */
/* @var $form c006\activeForm\ActiveForm */
?>

<div class="sort-tag-groups-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
