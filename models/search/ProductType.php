<?php

namespace c006\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use c006\products\models\ProductType as ProductTypeModel;

/**
 * ProductType represents the model behind the search form about `c006\products\models\ProductType`.
 */
class ProductType extends ProductTypeModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_core_type_id', 'is_viewable'], 'integer'],
            [['name'], 'safe'],
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
        $query = ProductTypeModel::find();

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
            'id' => $this->id,
            'product_core_type_id' => $this->product_core_type_id,
            'is_viewable' => $this->is_viewable,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
