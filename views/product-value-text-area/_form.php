<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductValueTextArea */
/* @var $form yii\widgets\ActiveForm; */
?>

<div class="product-value-text-area-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?
    $model_link = \c006\products\models\Product::find()->all();
    $model_link = ArrayHelper::map($model_link, 'id', 'value');
    echo $form->field($model, 'product_id')->dropDownList($model_link)->label('Product') ?>

    <?
    $model_link = \c006\products\models\ProductAttr::find()->all();
    $model_link = ArrayHelper::map($model_link, 'id', 'value');
    echo $form->field($model, 'attr_id')->dropDownList($model_link)->label('Product Attr') ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


