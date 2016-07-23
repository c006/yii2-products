<?php

use c006\products\assets\ModelHelper;
use yii\helpers\ArrayHelper;

/** @var  $model_class_name string */
/** @var  $product_id int */

$model = new \c006\products\models\PriceTier();

$model_link = ModelHelper::getPriceTier(0, FALSE);
$model_link = ArrayHelper::map($model_link, 'id', 'name');
echo $form->field($model, 'id')->dropDownList([0 => 'Disabled'] + $model_link)->label('Price Tier');

?>

<style>
    div[id^=PriceTier] {
        margin                : 10px;
        border                : 1px dotted #CCCCCC;
        -webkit-border-radius : 10px;
        -moz-border-radius    : 10px;
        border-radius         : 10px;
    }

    div[id^=PriceTier] .table-cell {
        padding               : 5px;
        border                : 1px solid #EEEEEE;
        -webkit-border-radius : 10px;
        -moz-border-radius    : 10px;
        border-radius         : 10px;
    }
</style>

<?php foreach (ModelHelper::getPriceTier(0) as $item) : ?>
    <div id="PriceTier-<?= $item['id'] ?>" class="table hide">
        <?php foreach (ModelHelper::getPriceTierLink($item['id']) as $tier) : ?>
            <div class="table-cell">
                <div>$<?= number_format($tier['price'] + 0.0000001, 2) ?></div>
                <div>Qty: <?= $tier['max_qty'] ?></div>
            </div>
        <?php endforeach ?>
    </div>
<?php endforeach ?>


<script type="text/javascript">
    jQuery(function () {
        jQuery('#pricetier-id')
            .bind('change', function () {
                var $this = jQuery(this);
                if ($this.val() != '0') {
                    jQuery('#<?= strtolower($model_class_name) ?>-core_price').prop("disabled", true);
                } else {
                    jQuery('#<?= strtolower($model_class_name) ?>-core_price').prop("disabled", false);
                }
                jQuery('div[id^=PriceTier]').addClass('hide');
                jQuery('#PriceTier-' + $this.val()).removeClass('hide');
            }).trigger('change');

        jQuery('#pricetier-id').val('<?= ModelHelper::getProductValue($product_id, '\c006\products\models\ProductPriceTier','price_tier_id', "0") ?>');
    });
</script>
