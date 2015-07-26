<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_value_text".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $attr_id
 * @property string $data
 *
 * @property ProductAttr $attr
 * @property Product $product
 */
class ProductValueText extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_value_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'attr_id', 'data'], 'required'],
            [['product_id', 'attr_id'], 'integer'],
            [['data'], 'string', 'max' => 400],
            [['attr_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAttr::className(), 'targetAttribute' => ['attr_id'=>'id']],
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
            'attr_id' => Yii::t('app', 'Attr ID'),
            'data' => Yii::t('app', 'Data'),
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
