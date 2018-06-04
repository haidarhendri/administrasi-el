<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserWarga;

/**
 * UserWargaSearch represents the model behind the search form about `app\models\UserWarga`.
 */
class UserWargaSearch extends UserWarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'nama_user', 'password', 'status_jabatan', 'nama_kepala_keluarga', 'alamat', 'kode_pos'], 'safe'],
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
        $query = UserWarga::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'nama_user', $this->nama_user])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'status_jabatan', $this->status_jabatan])
            ->andFilterWhere(['like', 'nama_kepala_keluarga', $this->nama_kepala_keluarga])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos]);

        return $dataProvider;
    }
}
