<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailAnggotaKeluarga;

/**
 * DetailAnggotaKeluargaSearch represents the model behind the search form about `app\models\DetailAnggotaKeluarga`.
 */
class DetailAnggotaKeluargaSearch extends DetailAnggotaKeluarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'no_kk', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'golongan_darah', 'agama', 'status_nikah', 'status_keluarga', 'pendidikan', 'pekerjaan', 'nama_ayah', 'nama_ibu', 'warga_negara'], 'safe'],
            [['rt', 'rw'], 'integer'],
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
        $query = DetailAnggotaKeluarga::find();

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
            'tanggal_lahir' => $this->tanggal_lahir,
            'rt' => $this->rt,
            'rw' => $this->rw,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'golongan_darah', $this->golongan_darah])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'status_nikah', $this->status_nikah])
            ->andFilterWhere(['like', 'status_keluarga', $this->status_keluarga])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'warga_negara', $this->warga_negara]);

        return $dataProvider;
    }
}
