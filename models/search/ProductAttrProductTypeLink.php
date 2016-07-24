<?php

namespace c006\products\models\search;

use c006\products\models\ProductAttrProductTypeLink as ProductAttrProductTypeLinkModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductAttrProductTypeLink represents the model behind the search form about `c006\products\models\ProductAttrProductTypeLink`.
 */
class ProductAttrProductTypeLink extends ProductAttrProductTypeLinkModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'attr_id', 'product_core_type_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductAttrProductTypeLinkModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'                   => $this->id,
            'attr_id'              => $this->attr_id,
            'product_core_type_id' => $this->product_core_type_id,
        ]);

        return $dataProvider;
    }
}
