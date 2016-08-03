<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_brand".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $brand_id
 *
 * @property Product $product
 */
class ProductBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'brand_id'], 'required'],
            [['product_id', 'brand_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product'),
            'brand_id'     => Yii::t('app', 'Brand'),
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
