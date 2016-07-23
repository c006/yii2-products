<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_price_tier".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $price_tier_id
 *
 * @property Product $product
 */
class ProductPriceTier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_price_tier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'price_tier_id'], 'required'],
            [['product_id', 'price_tier_id'], 'integer']
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
            'price_tier_id' => Yii::t('app', 'Price Tier ID'),
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
