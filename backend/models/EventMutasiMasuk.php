<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_mutasi_masuk".
 *
 * @property string $NIK
 * @property string $jenis_mutasi
 * @property string $klasifikasi_mutasi
 * @property string $id_kelurahan_lama
 * @property string $rt_lama
 * @property string $rw_lama
 * @property string $tanggal_proses
 *
 * @property Kelurahan $kelurahanLama
 * @property DetailAnggotaKeluarga $nIK
 */
class EventMutasiMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_mutasi_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIK', 'jenis_mutasi', 'klasifikasi_mutasi', 'id_kelurahan_lama', 'rt_lama', 'rw_lama', 'tanggal_proses'], 'required'],
            [['tanggal_proses'], 'safe'],
            [['NIK', 'id_kelurahan_lama'], 'string', 'max' => 25],
            [['jenis_mutasi', 'klasifikasi_mutasi'], 'string', 'max' => 50],
            [['rt_lama', 'rw_lama'], 'string', 'max' => 3],
            [['NIK'], 'unique'],
            [['id_kelurahan_lama'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['id_kelurahan_lama' => 'id_kelurahan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NIK' => 'NIK',
            'jenis_mutasi' => 'Jenis Mutasi',
            'klasifikasi_mutasi' => 'Klasifikasi Mutasi',
            'id_kelurahan_lama' => 'Kelurahan Lama',
            'rt_lama' => 'RT Lama',
            'rw_lama' => 'RW Lama',
            'tanggal_proses' => 'Tanggal Proses',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahanLama()
    {
        return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan_lama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIK()
    {
        return $this->hasOne(DetailAnggotaKeluarga::className(), ['nik' => 'NIK']);
    }
}
