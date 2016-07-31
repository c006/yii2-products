<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\products\models\search\ProductCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Product Categories');
$this->params['breadcrumbs'][] = $this->title;
?>


<div id="content" class="product-category-index">

    <div class="title-large">Categories</div>
    <?= Html::button('Add Category', ['class' => 'btn btn-primary float-right', 'id' => 'button-add']) ?>

    <?php $form = ActiveForm::begin([]); ?>

    <div id="tree">
        <ul>
            <li>Home
                <?php foreach ([] as $item) : ?>


                <?php endforeach ?>
        </ul>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

</div>

<script type="text/javascript">

    var _category = new Category('#tree');

    jQuery(function () {
        jQuery('#tree').jstree(
            {
                "types": {
                    "default": {
                        "icon": "glyphicon glyphicon-dot"
                    },
                    "demo": {
                        "icon": "glyphicon glyphicon-ok"
                    }
                },
                "core": {
                    "multiple": false,
                },
                "plugins": ["types", "unique", "dnd"]
            }
            )
            .bind("loaded.jstree", function (event, data) {
                jQuery(this).jstree("open_all");
            });

        function action_callback(operation, node, parent, position, more) {
            if (operation === "copy_node" || operation === "move_node") {
                if (parent.id === "#") {
                    return false; // prevent moving a child above or below the root
                } else {

                }
            }
            if (operation === "create_node") {

            }
            if (operation === "rename_node") {
                _category.get_nodes();
                var _node = _category.get_node(0);
                _category.ajax({name: _node[1], level: _node[2]});
                console.log(_node);
            }
        }


        jQuery('#button-add')
            .click(function () {
                document.location.href = '/?r=/products/category/create';
            });

    });
</script>
