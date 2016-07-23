<?php

use c006\activeForm\ActiveForm;
use c006\products\assets\AttrHelper;
use c006\products\assets\FormHelper;
use yii\bootstrap\Html;

/** @var  $form  \c006\activeForm\ActiveForm */
/** @var  $model \c006\products\models\Product */
/** @var  $model_form */
/** @var  $model_product_type \c006\products\models\ProductType */
/** @var  $product_id int */
/** @var  $product_categories array */

/** @var  $sections array */
$sections = \c006\products\assets\AttrHelper::getSections($model->product_type_id);

$this->title                   = Yii::t('app', 'Update Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => 'products'];
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .tab-section.section-on {
        border :1px solid #416381;
    }

    .tab-section.section-error {
        border :1px solid #9b403d !important;
    }
</style>

<div id="add-product-categories-container">

    <div class="title-large"><?= $this->title ?></div>

    <div class="form">
        <?php $form = ActiveForm::begin(
                ['id'      => 'form-submit',
                 'options' => ['enctype' => 'multipart/form-data'],
                ]); ?>

        <?php echo $form->field($model, 'product_type_id')->hide() ?>

        <div class="table">

            <div class="table-cell product-tab-container">
                <ul id="vertical-tabs-container">
                    <?php foreach ($sections as $_section) : ?>
                        <li class="tab-section" item_id="<?= $_section['id'] ?>">
                            <span><?= $_section['name'] ?></span>
                        </li>
                    <?php endforeach ?>
                </ul>
                <div class="form-group padding-10">
                    <?= Html::button(($model->isNewRecord) ? 'Create Product' : 'Update Product', ['class' => 'btn btn-primary', 'name' => 'button-submit', 'id' => 'button-submit']) ?>
                </div>
            </div>

            <div class="table-cell width-80">
                <?php foreach ($sections as $_section) : ?>
                    <div id="section-<?= $_section['id'] ?>" item_id="<?= $_section['id'] ?>"
                         class="section-container item-container">
                        <div class="title-medium"><?= $_section['name'] ?></div>
                        <?php foreach (AttrHelper::getSectionAttributes($_section['id']) as $_attr) : ?>

                            <?php if ($_attr['attr_type']['element'] == 'component') : ?>
                                <?= FormHelper::component($model->id, $form, $_attr, FormHelper::createModelName($model_product_type['name'])) ?>
                            <?php else: ?>
                                <?php $model_form[ $_attr['attr']['name'] ] = FormHelper::getAttrValue($product_id, $_attr) ?>
                                <?= FormHelper::formElement($form, $model_form, $_attr); ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>

            </div>

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
                    jQuery('.tab-section').removeClass('section-on');
                    $this.addClass('section-on');
                    jQuery('.section-container').hide();
                    jQuery('#section-' + $this.attr('item_id')).show();
                });

        jQuery('.tab-section:first-of-type').click();

        jQuery('#button-submit')
                .click(function () {
                    jQuery('#c006').show();
                    jQuery('html').scrollTop(0);
                    var ok = 1;
                    var $form = jQuery('#<?= $form->id ?>');
                    $form.find('input')
                            .each(function () {
                                jQuery(this).focus().blur();
                            });
                    jQuery('li.tab-section[item_id]').removeClass('section-error');
                    setTimeout(function () {
                        $form.find('div.has-error')
                                .each(function () {
                                    ok = 0;
                                    var $this = jQuery(this);
                                    var $parent = $this.closest('div[item_id')
                                    jQuery('li.tab-section[item_id=' + $parent.attr('item_id') + ']').addClass('section-error');
                                });

                        if (ok) {
                            $form.submit();
                        } else {
                            jQuery('#c006').hide();
                        }
                    }, 300);
                });

        <?php if (sizeof($product_categories))  : ?>
        /* Categories */
        <?php foreach ($product_categories as $item) : ?>
        jQuery('#Category-<?= $item['category_id'] ?>').click();
        <?php endforeach; ?>
        <?php endif ?>

    });

</script>

