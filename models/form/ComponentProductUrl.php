<?php
namespace c006\products\models\form;

class ComponentProductUrl extends \yii\db\ActiveRecord
{

    public $product_url = '';


    public function rules()
    {
        return [
            ['product_url', 'required'],
        ];
    }
}