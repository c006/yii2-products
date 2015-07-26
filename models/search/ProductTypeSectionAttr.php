<?php

namespace c006\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use c006\products\models\ProductTypeSectionAttr as ProductTypeSectionAttrModel;

/**
 * ProductTypeSectionAttr represents the model behind the search form about `c006\products\models\ProductTypeSectionAttr`.
 */
class ProductTypeSectionAttr extends ProductTypeSectionAttrModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_type_section_id', 'attr_id', 'position'], 'integer'],
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
        $query = ProductTypeSectionAttrModel::find();

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
            'product_type_section_id' => $this->product_type_section_id,
            'attr_id' => $this->attr_id,
            'position' => $this->position,
        ]);

        return $dataProvider;
    }
}
