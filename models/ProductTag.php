<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_tag".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $tag_id
 *
 * @property Product $product
 */
class ProductTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'tag_id'], 'required'],
            [['product_id', 'tag_id'], 'integer'],
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
            'tag_id'     => Yii::t('app', 'Tag ID'),
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
