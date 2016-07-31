<?php

use c006\products\assets\FormHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model c006\products\models\AutoShip */
/* @var $model_link c006\products\models\AutoShipLink */
/* @var $form yii\widgets\ActiveForm */

$duration = \c006\core\assets\CoreHelper::minMaxRange(1, 12);
$type = ['week', 'month', 'year'];
?>

<style>
    .item-link {
        margin: 10px;
        padding: 5px;
        border: 1px dotted #CCCCCC;

        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
    }

    .item-link .close {
        float: none;
        text-align: right;
    }
</style>

<div class="auto-ship-form">

    <div class="item-container margin-top-30">

        <?php $form = ActiveForm::begin([]); ?>

        <div class="table">
            <div class="table-cell">
                <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>
                <?= $form->field($model, 'active')->dropDownList(['No', 'Yes']) ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-secondary' : 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-cell width-50 padding-left-20">
                <?= Html::button('Add Date Increment', ['class' => 'btn btn-primary', 'id' => 'button-add-ship']) ?>
                <div id="link-container">
                    <?php if (sizeof($model_link)): ?>
                        <?php foreach ($model_link as $i => $item) : ?>
                            <div class="table relative item-link form-group">
                                <span title="remove" alt="remove" class="icon icon-delete icon-top-right pointer"></span>
                                <div class="table-cell width-50 padding-top-10">
                                    <label>Duration</label>
                                    <select name="AutoShipLink[<?= $i ?>][duration]" class="form-control">
                                        <?php foreach ($duration as $option) : ?>
                                            <option value="<?= $option ?>" <?= ($item['duration'] == $option) ? 'selected="selected"' : '' ?> ><?= ucwords($option) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="table-cell">
                                    <label>Type</label>
                                    <select name="AutoShipLink[<?= $i ?>][type]" class="form-control">
                                        <?php foreach ($type as $option) : ?>
                                            <option value="<?= $option ?>" <?= ($item['type'] == $option) ? 'selected="selected"' : '' ?> ><?= ucwords($option) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <input type="hidden" name="AutoShipLink[<?= $i ?>][id]" value="<?= $item['id'] ?>"/>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>

        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

<script type="text/javascript">
    jQuery(function () {

        jQuery('#button-add-ship')
            .click(function () {
                add_ship(jQuery('.item-link').length);
            });


        function add_ship($i) {
            var html = '' +
                '<div class="table relative item-link form-group">' +
                '       <span class="icon icon-delete icon-top-right pointer" alt="remove" title="remove"></span>' +
                '    <div class="table-cell width-50 padding-top-10">' +
                '        <label>Duration</label>' +
                '        <select class="form-control" name="AutoShipLink[' + $i + '][duration]">' +
                '        <?= FormHelper::createSelectOptions($duration); ?>' +
                '        </select>' +
                '    </div>' +
                '    <div class="table-cell">' +
                '        <label>Type</label>' +
                '        <select class="form-control" name="AutoShipLink[' + $i + '][type]">' +
                '       <option value="week">Week</option>' +
                '       <option value="month">Month</option>' +
                '       <option value="year">Year</option>' +
                '       </select>' +
                '    </div>' +
                '</div>' +
                '';
            var $tc = jQuery('#link-container');
            $tc.append(html);
            remove_ship();
        }

        function remove_ship() {
            jQuery('#link-container')
                .find('.icon-delete')
                .unbind('click')
                .bind('click',
                    function () {
                        jQuery(this).parent().empty().remove();
                    });
        }

        remove_ship();
    });
</script>