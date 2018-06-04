<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property string $id_kabupaten
 * @property string $id_provinsi
 * @property string $nama_kabupaten
 *
 * @property Provinsi $provinsi
 * @property KartuKeluarga[] $kartuKeluargas
 * @property Kecamatan[] $kecamatans
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kabupaten', 'id_provinsi', 'nama_kabupaten'], 'required'],
            [['id_kabupaten', 'nama_kabupaten'], 'string', 'max' => 25],
            [['id_provinsi'], 'string', 'max' => 2],
            [['id_kabupaten'], 'unique'],
            [['id_provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_provinsi' => 'id_provinsi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kabupaten' => 'Id Kabupaten',
            'id_provinsi' => 'Id Provinsi',
            'nama_kabupaten' => 'Nama Kabupaten',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id_provinsi' => 'id_provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartuKeluargas()
    {
        return $this->hasMany(KartuKeluarga::className(), ['id_kabupaten' => 'id_kabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['id_kabupaten' => 'id_kabupaten']);
    }
}
