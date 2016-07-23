<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_packaging".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $packaging_id
 * @property integer $position
 *
 * @property Product $product
 */
class ProductPackaging extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_packaging';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'packaging_id', 'position'], 'required'],
            [['product_id', 'packaging_id', 'position'], 'integer']
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
            'packaging_id' => Yii::t('app', 'Packaging ID'),
            'position' => Yii::t('app', 'Position'),
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
