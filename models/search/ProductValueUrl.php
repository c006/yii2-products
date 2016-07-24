<?php

namespace c006\products\models\search;

use c006\products\models\ProductValueUrl as ProductValueUrlModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductValueUrl represents the model behind the search form about `c006\products\models\ProductValueUrl`.
 */
class ProductValueUrl extends ProductValueUrlModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'symbolic_url_id', 'attr_id'], 'integer'],
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
        $query = ProductValueUrlModel::find();

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
            'id'              => $this->id,
            'product_id'      => $this->product_id,
            'symbolic_url_id' => $this->symbolic_url_id,
            'attr_id'         => $this->attr_id,
        ]);

        return $dataProvider;
    }
}
