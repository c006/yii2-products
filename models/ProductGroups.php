<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_groups".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $product_include_id
 * @property integer $position
 *
 * @property Product $product
 */
class ProductGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_include_id', 'position'], 'required'],
            [['product_id', 'product_include_id', 'position'], 'integer'],
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
            'product_include_id' => Yii::t('app', 'Product Include ID'),
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
