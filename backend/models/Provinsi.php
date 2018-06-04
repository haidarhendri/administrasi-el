<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $id_provinsi
 * @property string $nama_provinsi
 *
 * @property Kabupaten[] $kabupatens
 * @property KartuKeluarga[] $kartuKeluargas
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_provinsi', 'nama_provinsi'], 'required'],
            [['nama_provinsi'], 'string'],
            [['id_provinsi'], 'string', 'max' => 2],
            [['id_provinsi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_provinsi' => 'Id Provinsi',
            'nama_provinsi' => 'Nama Provinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_provinsi' => 'id_provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartuKeluargas()
    {
        return $this->hasMany(KartuKeluarga::className(), ['id_provinsi' => 'id_provinsi']);
    }
}
