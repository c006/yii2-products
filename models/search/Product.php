<?php

namespace c006\products\models\search;

use c006\products\models\Product as ProductModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Product represents the model behind the search form about `c006\products\models\Product`.
 */
class Product extends ProductModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'store_id', 'position'], 'integer'],
            [['product_type_id'], 'safe'],
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
        $query = ProductModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->joinWith('productType');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'       => $this->id,
            'store_id' => $this->store_id,
            'position' => $this->position,
        ]);
        $query->andFilterWhere(['like', 'product_type.name', $this->product_type_id]);

        return $dataProvider;
    }
}
