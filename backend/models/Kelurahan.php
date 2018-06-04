<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelurahan".
 *
 * @property string $id_kelurahan
 * @property string $id_kecamatan
 * @property string $nama_kelurahan
 *
 * @property KartuKeluarga[] $kartuKeluargas
 * @property Kecamatan $kecamatan
 */
class Kelurahan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelurahan', 'id_kecamatan', 'nama_kelurahan'], 'required'],
            [['id_kelurahan', 'id_kecamatan', 'nama_kelurahan'], 'string', 'max' => 25],
            [['id_kelurahan'], 'unique'],
            [['id_kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kecamatan' => 'id_kecamatan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelurahan' => 'Id Kelurahan',
            'id_kecamatan' => 'Id Kecamatan',
            'nama_kelurahan' => 'Nama Kelurahan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartuKeluargas()
    {
        return $this->hasMany(KartuKeluarga::className(), ['id_kelurahan' => 'id_kelurahan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan']);
    }
}
