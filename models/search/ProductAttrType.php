<?php

namespace c006\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use c006\products\models\ProductAttrType as ProductAttrTypeModel;

/**
 * ProductAttrType represents the model behind the search form about `c006\products\models\ProductAttrType`.
 */
class ProductAttrType extends ProductAttrTypeModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_visible', 'show_in_admin'], 'integer'],
            [['name', 'element', 'type', 'description', 'value_table', 'column', 'value_type'], 'safe'],
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
        $query = ProductAttrTypeModel::find();

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
            'is_visible' => $this->is_visible,
            'show_in_admin' => $this->show_in_admin,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'element', $this->element])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'value_table', $this->value_table])
            ->andFilterWhere(['like', 'column', $this->column])
            ->andFilterWhere(['like', 'value_type', $this->value_type]);

        return $dataProvider;
    }
}
