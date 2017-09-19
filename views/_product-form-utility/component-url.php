<?php
/** @var  $product_id int */

$model = new \c006\products\models\form\ComponentProductUrl();

if ($product_id) {
    $product_url = \c006\products\assets\ProdHelpers::getProductUrl($product_id);
    $model->product_url = \c006\url\assets\AppAliasUrl::findById($product_url['alias_url_id'])['public'];
}

?>


<?= $form->field($model, 'product_url')->label('Product Url'); ?>


<script type="text/javascript">
    jQuery(function () {
        var $product_url = jQuery('#componentproducturl-product_url');
        $product_url
            .bind('blur keyup change', function () {
            var $this = jQuery(this);
            var _val = $this.val();
            if (_val.substr(0, 1) != "/") {
                _val = '/' + _val;
            }
            $this.val(_val.toLowerCase().replace(/\s+/,'-').replace(/[^\/a-z0-9-]/,''));
        });
        if($product_url.val() == "") {
            $product_url.val(jQuery('#simpleproducts-core_name').val());
            $product_url.trigger("keyup");
        }

    });
</script>