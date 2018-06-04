<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $id_kecamatan
 * @property string $id_kabupaten
 * @property string $nama_kecamatan
 *
 * @property KartuKeluarga[] $kartuKeluargas
 * @property Kabupaten $kabupaten
 * @property Kelurahan[] $kelurahans
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kecamatan', 'id_kabupaten', 'nama_kecamatan'], 'required'],
            [['id_kecamatan', 'id_kabupaten', 'nama_kecamatan'], 'string', 'max' => 25],
            [['id_kecamatan'], 'unique'],
            [['id_kabupaten'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kabupaten' => 'id_kabupaten']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kecamatan' => 'Id Kecamatan',
            'id_kabupaten' => 'Id Kabupaten',
            'nama_kecamatan' => 'Nama Kecamatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartuKeluargas()
    {
        return $this->hasMany(KartuKeluarga::className(), ['id_kecamatan' => 'id_kecamatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id_kabupaten' => 'id_kabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahans()
    {
        return $this->hasMany(Kelurahan::className(), ['id_kecamatan' => 'id_kecamatan']);
    }
}
