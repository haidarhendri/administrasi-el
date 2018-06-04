<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_kematian".
 *
 * @property string $NIK
 * @property string $tempat_meninggal
 * @property string $sebab_meninggal
 * @property string $tanggal_kematian
 *
 * @property DetailAnggotaKeluarga $nIK
 */
class EventKematian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_kematian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIK', 'tempat_meninggal', 'sebab_meninggal', 'tanggal_kematian'], 'required'],
            [['tanggal_kematian'], 'safe'],
            [['NIK'], 'string', 'max' => 25],
            [['tempat_meninggal', 'sebab_meninggal'], 'string', 'max' => 50],
            [['NIK'], 'unique'],
            [['NIK'], 'exist', 'skipOnError' => true, 'targetClass' => DetailAnggotaKeluarga::className(), 'targetAttribute' => ['NIK' => 'nik']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NIK' => 'Nik',
            'tempat_meninggal' => 'Tempat Meninggal',
            'sebab_meninggal' => 'Sebab Meninggal',
            'tanggal_kematian' => 'Tanggal Kematian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIK()
    {
        return $this->hasOne(DetailAnggotaKeluarga::className(), ['nik' => 'NIK']);
    }
}
