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
            [['nik', 'no_kk', 'nama', 'jenis_kelamin', 'agama', 'pekerjaan'], 'safe'],
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

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan]);

        return $dataProvider;
    }
}
