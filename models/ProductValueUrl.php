<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_value_url".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $alias_url_id
 * @property integer $attr_id
 * @property string $value
 *
 * @property Product $product
 */
class ProductValueUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_value_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'alias_url_id', 'value'], 'required'],
            [['product_id', 'alias_url_id', 'attr_id'], 'integer'],
            [['value'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'alias_url_id' => Yii::t('app', 'Alias Url ID'),
            'attr_id' => Yii::t('app', 'Attr ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
