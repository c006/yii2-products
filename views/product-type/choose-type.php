<?php

use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

$types = \c006\products\models\ProductCoreType::find()->orderBy('value')->all();

?>


<div id="content">

    <h1 class="title-large">Product Type</h1>

    <div class="item-container margin-top-30">

        <div class="form">
            <?php $form = ActiveForm::begin(['id' => 'form-submit']); ?>

            <?php echo $form->field($model, 'product_core_type_id')->dropDownList(\yii\helpers\ArrayHelper::map($types, 'id', 'value'))->label('Choose Product Type'); ?>

            <div class="form-group">
                <?= Html::submitButton('Continue', ['class' => 'btn btn-primary', 'name' => 'button-submit']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

