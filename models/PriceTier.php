<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "price_tier".
 *
 * @property integer         $id
 * @property string          $name
 * @property integer         $active
 *
 * @property PriceTierLink[] $priceTierLinks
 */
class PriceTier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_tier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'     => Yii::t('app', 'ID'),
            'name'   => Yii::t('app', 'Name'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceTierLinks()
    {
        return $this->hasMany(PriceTierLink::className(), ['price_tier_id' => 'id']);
    }
}
