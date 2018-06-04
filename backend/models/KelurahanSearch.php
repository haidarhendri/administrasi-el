<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kelurahan;

/**
 * KelurahanSearch represents the model behind the search form about `app\models\Kelurahan`.
 */
class KelurahanSearch extends Kelurahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelurahan', 'id_kecamatan', 'nama_kelurahan'], 'safe'],
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
        $query = Kelurahan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id_kelurahan', $this->id_kelurahan])
            ->andFilterWhere(['like', 'id_kecamatan', $this->id_kecamatan])
            ->andFilterWhere(['like', 'nama_kelurahan', $this->nama_kelurahan]);

        return $dataProvider;
    }
}
