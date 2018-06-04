<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventMutasiKeluar;

/**
 * EventMutasiKeluarSearch represents the model behind the search form about `app\models\EventMutasiKeluar`.
 */
class EventMutasiKeluarSearch extends EventMutasiKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NIK', 'jenis_mutasi', 'klasifikasi_mutasi', 'tanggal_proses', 'id_kelurahan_baru', 'rt_baru', 'rw_baru'], 'safe'],
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
        $query = EventMutasiKeluar::find();

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
            'tanggal_proses' => $this->tanggal_proses,
        ]);

        $query->andFilterWhere(['like', 'NIK', $this->NIK])
            ->andFilterWhere(['like', 'jenis_mutasi', $this->jenis_mutasi])
            ->andFilterWhere(['like', 'klasifikasi_mutasi', $this->klasifikasi_mutasi])
            ->andFilterWhere(['like', 'id_kelurahan_baru', $this->id_kelurahan_baru])
            ->andFilterWhere(['like', 'rt_baru', $this->rt_baru])
            ->andFilterWhere(['like', 'rw_baru', $this->rw_baru]);

        return $dataProvider;
    }
}
