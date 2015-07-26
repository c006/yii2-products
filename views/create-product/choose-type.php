<?php

use c006\activeForm\ActiveForm;
use c006\products\models\ProductTypes;
use yii\bootstrap\Html;

$types = \c006\products\models\ProductCoreTypes::find()->orderBy('data')->all();

?>


<div id="content">

    <div class="title-large"></div>

    <div class="form">
        <?php $form = ActiveForm::begin(['id' => 'form-submit']); ?>

        <?php echo $form->field($model, 'product_type_id')->dropDownList(\yii\helpers\ArrayHelper::map($types, 'id', 'data'))->label('Choose Product Type'); ?>

        <div class="form-group">
            <?= Html::submitButton('Continue', ['class' => 'btn btn-primary', 'name' => 'button-submit']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

