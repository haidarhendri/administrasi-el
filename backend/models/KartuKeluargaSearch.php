<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KartuKeluarga;

/**
 * KartuKeluargaSearch represents the model behind the search form about `app\models\KartuKeluarga`.
 */
class KartuKeluargaSearch extends KartuKeluarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_kk', 'id_provinsi', 'id_kabupaten', 'id_kecamatan', 'id_kelurahan', 'rt', 'rw', 'nama_kepala_keluarga', 'alamat', 'kode_pos'], 'safe'],
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
        $query = KartuKeluarga::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'id_provinsi', $this->id_provinsi])
            ->andFilterWhere(['like', 'id_kabupaten', $this->id_kabupaten])
            ->andFilterWhere(['like', 'id_kecamatan', $this->id_kecamatan])
            ->andFilterWhere(['like', 'id_kelurahan', $this->id_kelurahan])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'nama_kepala_keluarga', $this->nama_kepala_keluarga])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos]);

        return $dataProvider;
    }
}
