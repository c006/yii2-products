<?php

/** @var $css string */
/** @var $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


    <div class="css-form">

        <div class="item-container margin-top-30">

            <?php $form = ActiveForm::begin([]); ?>

            <?= $form->field($model, 'css')->textarea(['style' => 'height:80vh;']) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>