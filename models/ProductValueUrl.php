<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_value_url".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $symbolic_url_id
 * @property integer $attr_id
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
            [['product_id', 'symbolic_url_id'], 'required'],
            [['product_id', 'symbolic_url_id', 'attr_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id'=>'id']],
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
            'symbolic_url_id' => Yii::t('app', 'Symbolic Url ID'),
            'attr_id' => Yii::t('app', 'Attr ID'),
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
