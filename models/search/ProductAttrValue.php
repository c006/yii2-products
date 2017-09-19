<?php

namespace c006\products\models\search;

use c006\products\models\ProductAttrValue as ProductAttrValueModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductAttrValue represents the model behind the search form about `c006\products\models\ProductAttrValue`.
 */
class ProductAttrValue extends ProductAttrValueModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'attr_id', 'position'], 'integer'],
            [['name', 'value'], 'safe'],
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
        $query = ProductAttrValueModel::find();

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
            'id'       => $this->id,
            'attr_id'  => $this->attr_id,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
