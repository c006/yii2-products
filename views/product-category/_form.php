<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm; */
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin([]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-secondary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


