<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TagihanWarga;

/**
 * TagihanWargaSearch represents the model behind the search form about `app\models\TagihanWarga`.
 */
class TagihanWargaSearch extends TagihanWarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bulan_tunggakan'], 'integer'],
            [['NIK', 'id_tagihan'], 'safe'],
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
        $query = TagihanWarga::find();

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
            'bulan_tunggakan' => $this->bulan_tunggakan,
        ]);

        $query->andFilterWhere(['like', 'NIK', $this->NIK])
            ->andFilterWhere(['like', 'id_tagihan', $this->id_tagihan]);

        return $dataProvider;
    }
}
