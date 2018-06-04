<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventKematian;

/**
 * EventKematianSearch represents the model behind the search form about `app\models\EventKematian`.
 */
class EventKematianSearch extends EventKematian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NIK', 'tempat_meninggal', 'sebab_meninggal', 'tanggal_kematian'], 'safe'],
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
        $query = EventKematian::find();

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
            'tanggal_kematian' => $this->tanggal_kematian,
        ]);

        $query->andFilterWhere(['like', 'NIK', $this->NIK])
            ->andFilterWhere(['like', 'tempat_meninggal', $this->tempat_meninggal])
            ->andFilterWhere(['like', 'sebab_meninggal', $this->sebab_meninggal]);

        return $dataProvider;
    }
}
