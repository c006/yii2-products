<?php


echo "<?php\n";
?>

namespace <?= $namespace ?>;

use Yii;

/**
<?php foreach ($array as $item): ?>
    <?php if ($item['attr_type']['element'] == 'component') continue; ?>
    * @property <?= "{$item['attr_type']['value_type']} \${$item['attr']['name']}\n" ?>
<?php endforeach; ?>
*/

class <?= $class_name ?> extends \yii\db\ActiveRecord
{

<?php foreach ($array as $item): ?>
    public $<?= $item['attr']['name'] ?>;
<?php endforeach; ?>

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        <?php foreach ($array as $item): ?>
            <?php if ($item['attr']['is_required']) : ?>
                ['<?= $item['attr']['name'] ?>', 'required'],
            <?php endif ?>
        <?php endforeach; ?>
            ];
    }

}
