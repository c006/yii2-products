<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_value_bit".
 *
 * @property integer     $id
 * @property integer     $attr_id
 * @property integer     $product_id
 * @property integer     $data
 *
 * @property ProductAttr $attr
 * @property Product     $product
 */
class ProductValueBit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_value_bit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_id', 'product_id', 'value'], 'required'],
            [['attr_id', 'product_id', 'value'], 'integer'],
            [['attr_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => ProductAttr::className(), 'targetAttribute' => ['attr_id' => 'id']],
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
            'attr_id'    => Yii::t('app', 'Attr ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'value'      => Yii::t('app', 'Data'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttr()
    {
        return $this->hasOne(ProductAttr::className(), ['id' => 'attr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
