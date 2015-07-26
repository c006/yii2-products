<?php

use c006\activeForm\ActiveForm;
use c006\products\models\ProductTypes;

$types = ProductTypes::find()->orderBy('name')->all();

?>


<div id="content">

    <div class="title-large"></div>

    <div class="form">
        <?php $form = ActiveForm::begin(['id' => 'form-submit']); ?>

        <?php echo $form->field($model, 'product_type_id'); ?>
        <?php echo $form->field($model, 'product_type_id')->dropDownList(\yii\helpers\ArrayHelper::map($types, 'product_type_id', 'name')); ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

