<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ktp".
 *
 * @property string $nik
 * @property string $no_kk
 * @property string $masa_berlaku_ktp
 *
 * @property DetailAnggotaKeluarga $nik0
 * @property KartuKeluarga $noKk
 */
class Ktp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ktp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'no_kk', 'masa_berlaku_ktp'], 'required'],
            [['masa_berlaku_ktp'], 'safe'],
            [['nik', 'no_kk'], 'string', 'max' => 25],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => DetailAnggotaKeluarga::className(), 'targetAttribute' => ['nik' => 'nik']],
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
            'masa_berlaku_ktp' => 'Masa Berlaku KTP',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNik0()
    {
        return $this->hasOne(DetailAnggotaKeluarga::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoKk()
    {
        return $this->hasOne(KartuKeluarga::className(), ['no_kk' => 'no_kk']);
    }
}
