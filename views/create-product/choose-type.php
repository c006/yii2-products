<?php

use c006\activeForm\ActiveForm;
use yii\bootstrap\Html;

$types = \c006\products\models\ProductType::find()->orderBy('name')->all();


$this->title = Yii::t('app', 'Add Product');
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="add-product-container">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <div class="form">
        <?php $form = ActiveForm::begin(['id' => 'form-submit']); ?>

        <?php echo $form->field($model, 'product_type_id')->dropDownList(\yii\helpers\ArrayHelper::map($types, 'id', 'name'))->label('Choose Product Type'); ?>

        <div class="form-group">
            <?= Html::submitButton('Continue', ['class' => 'btn btn-primary', 'name' => 'button-submit']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

