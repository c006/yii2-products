<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_keyword".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $keyword_id
 *
 * @property Product $product
 */
class ProductKeyword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_keyword';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'keyword_id'], 'required'],
            [['product_id', 'keyword_id'], 'integer'],
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
            'keyword_id' => Yii::t('app', 'Keyword ID'),
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
