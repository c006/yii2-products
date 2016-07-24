<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_value_encrypted".
 *
 * @property integer     $id
 * @property integer     $product_id
 * @property integer     $attr_id
 * @property string      $data
 *
 * @property ProductAttr $attr
 * @property Product     $product
 */
class ProductValueEncrypted extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_value_encrypted';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'attr_id', 'value'], 'required'],
            [['product_id', 'attr_id'], 'integer'],
            [['value'], 'string', 'max' => 32],
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
            'product_id' => Yii::t('app', 'Product ID'),
            'attr_id'    => Yii::t('app', 'Attr ID'),
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
