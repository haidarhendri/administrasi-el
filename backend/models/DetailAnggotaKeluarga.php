<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_anggota_keluarga".
 *
 * @property string $nik
 * @property string $no_kk
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $agama
 * @property string $pekerjaan
 *
 * @property KartuKeluarga $noKk
 * @property Ktp[] $ktps
 */
class DetailAnggotaKeluarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_anggota_keluarga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'no_kk', 'nama', 'jenis_kelamin', 'agama', 'pekerjaan'], 'required'],
            [['nik', 'no_kk', 'nama', 'pekerjaan'], 'string', 'max' => 25],
            [['jenis_kelamin', 'agama'], 'string', 'max' => 10],
            [['nik'], 'unique'],
            [['no_kk'], 'exist', 'skipOnError' => true, 'targetClass' => KartuKeluarga::className(), 'targetAttribute' => ['no_kk' => 'no_kk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nik' => 'NIK',
            'no_kk' => 'Nomor KK',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'pekerjaan' => 'Pekerjaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoKk()
    {
        return $this->hasOne(KartuKeluarga::className(), ['no_kk' => 'no_kk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtps()
    {
        return $this->hasMany(Ktp::className(), ['nik' => 'nik']);
    }
}
