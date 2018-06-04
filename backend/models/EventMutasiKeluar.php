<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_mutasi_keluar".
 *
 * @property string $NIK
 * @property string $jenis_mutasi
 * @property string $klasifikasi_mutasi
 * @property string $tanggal_proses
 * @property string $id_kelurahan_baru
 * @property string $rt_baru
 * @property string $rw_baru
 *
 * @property DetailAnggotaKeluarga $nIK
 */
class EventMutasiKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_mutasi_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIK', 'jenis_mutasi', 'klasifikasi_mutasi', 'tanggal_proses', 'id_kelurahan_baru', 'rt_baru', 'rw_baru'], 'required'],
            [['tanggal_proses'], 'safe'],
            [['NIK', 'id_kelurahan_baru'], 'string', 'max' => 25],
            [['jenis_mutasi', 'klasifikasi_mutasi'], 'string', 'max' => 50],
            [['rt_baru', 'rw_baru'], 'string', 'max' => 4],
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
            'jenis_mutasi' => 'Jenis Mutasi',
            'klasifikasi_mutasi' => 'Klasifikasi Mutasi',
            'tanggal_proses' => 'Tanggal Proses',
            'id_kelurahan_baru' => 'Id Kelurahan Baru',
            'rt_baru' => 'Rt Baru',
            'rw_baru' => 'Rw Baru',
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
