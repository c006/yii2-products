<?php
use yii\bootstrap\Html;
use yii\helpers\Url;

/** @var  $form  \c006\activeForm\ActiveForm */
/** @var  $model \c006\products\models\form\ComponentImage */
$model = new \c006\products\models\form\ComponentImage();
/** @var  $array array */
$array = \c006\products\assets\ModelHelper::getProductImages($product_id);
/** @var  $base_path string */
$base_path    = Url::to('@frontend/web/images/products/');
$frontend_url = Yii::$app->params['frontend'] . '/images/products/';
?>

<?php
//print_r($array);
// exit;
?>
<div id="image-container">
    <div>
        <?= $form->field($model, 'imageSet')->fileInput(['class' => 'form-control'])->label('New Image Set')->hint('Upload new image set (S,M,L)'); ?>
        <?php if (sizeof($array)) : ?>
            <?= $form->field($model, 'imageExtra')->fileInput(['class' => 'form-control'])->label('Extra Image')->hint('Upload additional image'); ?>
        <?php endif ?>
    </div>
    <?php foreach ($array as $item) : ?>

        <div class="table">
            <div class="table-cell relative">
                <img src="<?= $frontend_url . $item['file'] ?>?<?= time() ?>" alt="">
                <div class="icon-top-left">
                    <span class="icon icon-replace icon-pointer" title="Replace" item_id="<?= $item['id'] ?>"></span>
                    <?php if ($item['position'] > 3) : ?>
                        <span class="icon icon-delete icon-pointer" title="Delete" item_id="<?= $item['id'] ?>"></span>
                    <?php endif ?>
                    <input type="file" value="" name="ComponentImage[imageReplace][<?= $item['id'] ?>]"
                           class="form-control hide" id="componentimage-replace-<?= $item['id'] ?>">
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <script type="text/javascript">
        jQuery(function () {
            jQuery('#image-container')
                .find('.icon-replace')
                .click(function () {
                    var $this = jQuery(this);
                    var $replace = jQuery('#componentimage-replace-' + $this.attr('item_id'));
                    if ($replace.attr('class').indexOf('hide') > -1) {
                        $replace.removeClass('hide');
                    } else {
                        $replace.addClass('hide');
                    }
                });

            jQuery('#image-container')
                .find('.icon-delete')
                .click(function () {
                    var $this = jQuery(this);
                    if (confirm("Delete image?\n\nAny current changes will be lost.") == true) {
                        var _html = '<form id="delete-image" method="post" action="<?= Yii::$app->urlManager->createUrl(['products/product-image/delete']); ?>&id='+$this.attr('item_id')+'">' +
                            '<input type="hidden" name="url" value="<?= Yii::$app->request->url; ?>" />' +
                            '<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />' +
                            '</form>';
                        jQuery('body').append(_html);
                        jQuery('#delete-image').submit();
                    }
                });
        });
    </script>

</div>
