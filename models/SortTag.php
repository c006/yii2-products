<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "sort_tag".
 *
 * @property integer $id
 * @property integer $sort_tag_group_id
 * @property string $name
 */
class SortTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sort_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_tag_group_id', 'name'], 'required'],
            [['sort_tag_group_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sort_tag_group_id' => Yii::t('app', 'Sort Tag Group ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
