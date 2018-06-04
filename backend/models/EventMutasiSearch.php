<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventMutasi;

/**
 * EventMutasiSearch represents the model behind the search form about `app\models\EventMutasi`.
 */
class EventMutasiSearch extends EventMutasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_event_mutasi', 'jenis_mutasi', 'klasifikasi_mutasi', 'no_kk', 'nik', 'id_kelurahan_lama', 'rt_lama', 'rw_lama', 'tanggal_proses', 'id_kelurahan_baru', 'rt_baru', 'rw_baru'], 'safe'],
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
        $query = EventMutasi::find();

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

        $query->andFilterWhere(['like', 'id_event_mutasi', $this->id_event_mutasi])
            ->andFilterWhere(['like', 'jenis_mutasi', $this->jenis_mutasi])
            ->andFilterWhere(['like', 'klasifikasi_mutasi', $this->klasifikasi_mutasi])
            ->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'id_kelurahan_lama', $this->id_kelurahan_lama])
            ->andFilterWhere(['like', 'rt_lama', $this->rt_lama])
            ->andFilterWhere(['like', 'rw_lama', $this->rw_lama])
            ->andFilterWhere(['like', 'id_kelurahan_baru', $this->id_kelurahan_baru])
            ->andFilterWhere(['like', 'rt_baru', $this->rt_baru])
            ->andFilterWhere(['like', 'rw_baru', $this->rw_baru]);

        return $dataProvider;
    }
}
