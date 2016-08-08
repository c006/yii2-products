<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model c006\products\models\SortTagGroups */
?>

<style>
    #model-link-container .close {
        position : absolute;
        right    : 5px;
        top      : 0px;
        }

    #model-link-container .model-link {
        display : block;
        margin  : 10px 0;
        }
</style>


<div class="sort-tag-groups-form">

    <div class="item-container">

        <?php $form = ActiveForm::begin(); ?>

        <div class="table">
            <div class="table-cell width-50 padding-right-20">
                <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="table-cell">
                <?= Html::button('Add Tag', ['class' => 'btn btn-secondary', 'id' => 'button-model-link']) ?>
                <div id="model-link-container">
                    <?php if (sizeof($model_link)): ?>
                        <?php foreach ($model_link as $i => $item) : ?>
                            <div class="model-link form-group">
                                <input type="text" value="<?= $item['name'] ?>" name="ModelLink[<?= $i ?>][name]" class="form-control">
                                <div class="close">
                                    <span class="icon icon-delete pointer"></span>
                                </div>
                                <input type="hidden" value="<?= $item['id'] ?>" name="ModelLink[<?= $i ?>][id]"/>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


<script type="text/javascript">
    jQuery(function () {

        jQuery('#button-model-link')
            .click(function () {
                add_model_link(jQuery('.model-link').length);
            });

        function add_model_link($i) {
            var html = '' +
                '<div class="model-link form-group">' +
                '   <div class="relative">' +
                '       <input type="text" id="model-link-'+ $i +'" class="form-control" name="ModelLink[' + $i + '][name]" value="" />' +
                '       <div class="close">' +
                '           <span class="icon icon-delete pointer"></span>' +
                '       </div>' +
                '   </div>' +
                '   <input type="hidden" name="ModelLink[' + $i + '][id]" value="0" />' +
                '</div>' +
                '';
            var $tc = jQuery('#model-link-container');
            $tc.append(html);
            jQuery('#model-link-'+ $i).focus();
            remove_tier();
        }

        function remove_tier() {
            var $container = jQuery('#model-link-container');
            var $icon = $container.find('.icon-delete');
            $icon.unbind('click')
                .click(
                    function () {
                        jQuery(this).parent().parent().empty().remove();
                    });
        }

        remove_tier();
    });
</script>