<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_shipping_address".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $shipping_address_id
 *
 * @property Product $product
 */
class ProductShippingAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_shipping_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'shipping_address_id'], 'required'],
            [['product_id', 'shipping_address_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                  => Yii::t('app', 'ID'),
            'product_id'          => Yii::t('app', 'Product'),
            'shipping_address_id' => Yii::t('app', 'Shipping Address'),
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
