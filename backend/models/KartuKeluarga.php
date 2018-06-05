<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kartu_keluarga".
 *
 * @property string $no_kk
 * @property string $id_provinsi
 * @property string $id_kabupaten
 * @property string $id_kecamatan
 * @property string $id_kelurahan
 * @property string $rt
 * @property string $rw
 * @property string $nama_kepala_keluarga
 * @property string $alamat
 * @property string $kode_pos
 *
 * @property DetailAnggotaKeluarga[] $detailAnggotaKeluargas
 * @property Kelurahan $kelurahan
 * @property Kecamatan $kecamatan
 * @property Kabupaten $kabupaten
 * @property Provinsi $provinsi
 * @property Ktp[] $ktps
 */
class KartuKeluarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kartu_keluarga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_kk', 'id_provinsi', 'id_kabupaten', 'id_kecamatan', 'id_kelurahan', 'rt', 'rw', 'nama_kepala_keluarga', 'alamat', 'kode_pos'], 'required'],
            [['no_kk', 'id_kabupaten', 'id_kecamatan', 'id_kelurahan', 'nama_kepala_keluarga'], 'string', 'max' => 25],
            [['id_provinsi'], 'string', 'max' => 25],
            [['rt', 'rw'], 'string', 'max' => 4],
            [['alamat'], 'string', 'max' => 50],
            [['kode_pos'], 'string', 'max' => 10],
            [['no_kk'], 'unique'],
            [['id_kelurahan'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['id_kelurahan' => 'id_kelurahan']],
            [['id_kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kecamatan' => 'id_kecamatan']],
            [['id_kabupaten'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kabupaten' => 'id_kabupaten']],
            [['id_provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_provinsi' => 'id_provinsi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_kk' => 'Nomor KK',
            'id_provinsi' => 'Provinsi',
            'id_kabupaten' => 'Kabupaten',
            'id_kecamatan' => 'Kecamatan',
            'id_kelurahan' => 'Kelurahan',
            'rt' => 'RT',
            'rw' => 'RW',
            'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
            'alamat' => 'Alamat',
            'kode_pos' => 'Kode Pos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailAnggotaKeluargas()
    {
        return $this->hasMany(DetailAnggotaKeluarga::className(), ['no_kk' => 'no_kk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan']);
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
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id_provinsi' => 'id_provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtps()
    {
        return $this->hasMany(Ktp::className(), ['no_kk' => 'no_kk']);
    }
}
