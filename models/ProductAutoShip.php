<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_auto_ship".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $auto_ship_id
 *
 * @property AutoShip $autoShip
 * @property Product $product
 */
class ProductAutoShip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_auto_ship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'auto_ship_id'], 'required'],
            [['product_id', 'auto_ship_id'], 'integer']
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
            'auto_ship_id' => Yii::t('app', 'Auto Ship ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoShip()
    {
        return $this->hasOne(AutoShip::className(), ['id' => 'auto_ship_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
