<?php

echo "<?php\n";
?>

namespace <?= $namespace ?>;

use Yii;

/**
* @property integer $product_id
* @property string $product_type_id
<?php foreach ($array as $item): ?>
    <?php if ($item['attr_type']['element'] == 'component') continue; ?>
    <?php
    $type = $item['attr_type']['value_type'];
    $type = (substr($type, 0, 7) == 'tinyint') ? 'boolean' : $type;
    $type = (substr($type, 0, 8) == 'smallint') ? 'integer' : $type;
    ?>
    * @property <?= "{$type} \${$item['attr']['name']}\n" ?>
<?php endforeach; ?>
*/

class <?= $class_name ?> extends \yii\db\ActiveRecord
{
public $product_id;
public $product_type_id;
<?php foreach ($array as $item): ?>
    public $<?= $item['attr']['name'] ?>;
<?php endforeach; ?>

/**
* @inheritdoc
*/
public function rules()
{
return [];
}
}
