<?php

use c006\activeForm\ActiveForm;
use c006\products\assets\AttrHelper;
use c006\products\assets\FormHelper;
use c006\products\models\ProductType;
use yii\bootstrap\Html;

/** @var  $model c006\products\models\Product */

/** @var  $sections array */
$sections = \c006\products\assets\AttrHelper::getSections($model->product_type_id);

?>


<div id="content">

    <div class="title-large">Add Products</div>

    <div class="form">
        <?php $form = ActiveForm::begin(['id' => 'form-submit']); ?>

        <?php echo $form->field($model, 'product_type_id')->hide() ?>

        <div class="table">

            <div class="table-cell product-tab-container">
                <ul id="tabs-container">
                    <?php foreach ($sections as $_section) : ?>
                        <li class="tab-section" item_id="<?= $_section['id'] ?>">
                            <span><?= $_section['name'] ?></span>
                        </li>
                    <?php endforeach ?>
                </ul>

            </div>


            <div class="table-cell">

                <?php foreach ($sections as $_section) : ?>
                    <div id="section-<?= $_section['id'] ?>" class="section-container item-container">
                        <div class="title-medium"><?= $_section['name'] ?></div>
                        <?php foreach (AttrHelper::getSectionAttributes($_section['id']) as $_attr) : ?>
                            <?= FormHelper::formElement($form, '\c006\products\models\form\\' . FormHelper::createModelName($model_product_type['name']), $_attr); ?>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>


            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Continue', ['class' => 'btn btn-primary', 'name' => 'button-submit']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

<script type="text/javascript">
    jQuery(function () {

        jQuery('.tab-section')
            .click(function () {
                var $this = jQuery(this);
                jQuery('.tab-section').removeClass('on');
                $this.addClass('on');
                jQuery('.section-container').hide();
                jQuery('#section-' + $this.attr('item_id')).show();
            });

        jQuery('.tab-section:first-of-type').click();
    });

</script>