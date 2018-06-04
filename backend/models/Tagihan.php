<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tagihan".
 *
 * @property string $id_tagihan
 * @property string $nama_tagihan
 * @property int $iuran_per_bulan
 *
 * @property TagihanWarga[] $tagihanWargas
 */
class Tagihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tagihan', 'nama_tagihan', 'iuran_per_bulan'], 'required'],
            [['iuran_per_bulan'], 'integer'],
            [['id_tagihan'], 'string', 'max' => 25],
            [['nama_tagihan'], 'string', 'max' => 20],
            [['id_tagihan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tagihan' => 'Id Tagihan',
            'nama_tagihan' => 'Nama Tagihan',
            'iuran_per_bulan' => 'Iuran Per Bulan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagihanWargas()
    {
        return $this->hasMany(TagihanWarga::className(), ['id_tagihan' => 'id_tagihan']);
    }
}
