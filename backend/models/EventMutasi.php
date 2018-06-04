<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_mutasi".
 *
 * @property string $id_event_mutasi
 * @property string $jenis_mutasi
 * @property string $klasifikasi_mutasi
 * @property string $no_kk
 * @property string $nik
 * @property string $id_kelurahan_lama
 * @property string $rt_lama
 * @property string $rw_lama
 * @property string $tanggal_proses
 * @property string $id_kelurahan_baru
 * @property string $rt_baru
 * @property string $rw_baru
 */
class EventMutasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_mutasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_event_mutasi', 'jenis_mutasi', 'klasifikasi_mutasi', 'no_kk', 'nik', 'id_kelurahan_lama', 'rt_lama', 'rw_lama', 'tanggal_proses', 'id_kelurahan_baru', 'rt_baru', 'rw_baru'], 'required'],
            [['tanggal_proses'], 'safe'],
            [['id_event_mutasi', 'no_kk', 'nik', 'id_kelurahan_lama', 'id_kelurahan_baru'], 'string', 'max' => 25],
            [['jenis_mutasi', 'klasifikasi_mutasi'], 'string', 'max' => 50],
            [['rt_lama', 'rw_lama', 'rt_baru', 'rw_baru'], 'string', 'max' => 4],
            [['id_event_mutasi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_event_mutasi' => 'Event Mutasi',
            'jenis_mutasi' => 'Jenis Mutasi',
            'klasifikasi_mutasi' => 'Klasifikasi Mutasi',
            'no_kk' => 'Nomor KK',
            'nik' => 'NIK',
            'id_kelurahan_lama' => 'Kelurahan Lama',
            'rt_lama' => 'RT Lama',
            'rw_lama' => 'RW Lama',
            'tanggal_proses' => 'Tanggal Proses',
            'id_kelurahan_baru' => 'Kelurahan Baru',
            'rt_baru' => 'RT Baru',
            'rw_baru' => 'RW Baru',
        ];
    }
}
