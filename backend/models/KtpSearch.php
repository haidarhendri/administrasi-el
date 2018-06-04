<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ktp;

/**
 * KtpSearch represents the model behind the search form about `app\models\Ktp`.
 */
class KtpSearch extends Ktp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'no_kk', 'masa_berlaku_ktp'], 'safe'],
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
        $query = Ktp::find();

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
            'masa_berlaku_ktp' => $this->masa_berlaku_ktp,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'no_kk', $this->no_kk]);

        return $dataProvider;
    }
}
