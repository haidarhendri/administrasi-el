<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventMutasiMasuk;

/**
 * EventMutasiMasukSearch represents the model behind the search form about `app\models\EventMutasiMasuk`.
 */
class EventMutasiMasukSearch extends EventMutasiMasuk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NIK', 'jenis_mutasi', 'klasifikasi_mutasi', 'id_kelurahan_lama', 'rt_lama', 'rw_lama', 'tanggal_proses'], 'safe'],
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
        $query = EventMutasiMasuk::find();

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
            ->andFilterWhere(['like', 'id_kelurahan_lama', $this->id_kelurahan_lama])
            ->andFilterWhere(['like', 'rt_lama', $this->rt_lama])
            ->andFilterWhere(['like', 'rw_lama', $this->rw_lama]);

        return $dataProvider;
    }
}
