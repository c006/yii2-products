<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "price_tier_link".
 *
 * @property integer $id
 * @property integer $price_tier_id
 * @property string $price
 * @property integer $max_qty
 * @property integer $is_percentage
 * @property integer $position
 *
 * @property PriceTier $priceTier
 */
class PriceTierLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_tier_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_tier_id', 'price', 'max_qty', 'position'], 'required'],
            [['price_tier_id', 'max_qty', 'is_percentage', 'position'], 'integer'],
            [['price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'price_tier_id' => Yii::t('app', 'Price Tier ID'),
            'price' => Yii::t('app', 'Price'),
            'max_qty' => Yii::t('app', 'Max Qty'),
            'is_percentage' => Yii::t('app', 'Is Percentage'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceTier()
    {
        return $this->hasOne(PriceTier::className(), ['id' => 'price_tier_id']);
    }
}
