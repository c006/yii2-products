<?php

use c006\products\assets\ModelHelper;
use yii\helpers\ArrayHelper;

/** @var  $model_class_name string */
/** @var  $product_id int */

$model = new \c006\products\models\AutoShip();


$model_link = ModelHelper::getAutoShip(0, FALSE);
$model_link = ArrayHelper::map($model_link, 'id', 'name');



echo $form->field($model, 'id')->dropDownList([0 => 'Disabled'] + $model_link)->label('Auto Ship');

?>

<style>
    div[id^=AutoShip] {
        margin                : 10px;
        border                : 1px dotted #CCCCCC;
        -webkit-border-radius : 10px;
        -moz-border-radius    : 10px;
        border-radius         : 10px;
    }

    div[id^=AutoShip] .table-cell {
        padding               : 5px;
        border                : 1px solid #EEEEEE;
        -webkit-border-radius : 10px;
        -moz-border-radius    : 10px;
        border-radius         : 10px;
    }
</style>

<?php foreach (ModelHelper::getAutoShip(0) as $item) : ?>
    <div id="AutoShip-<?= $item['id'] ?>" class="table hide">
        <?php foreach (ModelHelper::getAutoShipLink($item['id']) as $_tier) : ?>
            <div class="table-cell">
                <div><?= $_tier['duration']  ?> /  <?= $_tier['type'] ?></div>
            </div>
        <?php endforeach ?>
    </div>
<?php endforeach ?>


<script type="text/javascript">
    jQuery(function () {
        jQuery('#autoship-id')
            .bind('change', function () {
                var $this = jQuery(this);
                if ($this.val() != '0') {
                    jQuery('#<?= strtolower($model_class_name) ?>-core_price').prop("disabled", true);
                } else {
                    jQuery('#<?= strtolower($model_class_name) ?>-core_price').prop("disabled", false);
                }
                jQuery('div[id^=AutoShip]').addClass('hide');
                jQuery('#AutoShip-' + $this.val()).removeClass('hide');
            }).trigger('change');

        jQuery('#autoship-id').val('<?= ModelHelper::getProductValue($product_id, '\c006\products\models\ProductAutoShip','auto_ship_id', "0") ?>');
    });
</script>
