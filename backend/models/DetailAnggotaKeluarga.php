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
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $golongan_darah
 * @property string $agama
 * @property string $status_nikah
 * @property string $status_keluarga
 * @property string $pendidikan
 * @property string $pekerjaan
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property int $rt
 * @property int $rw
 * @property string $warga_negara
 *
 * @property KartuKeluarga $noKk
 * @property EventKematian $eventKematian
 * @property EventMutasiKeluar $eventMutasiKeluar
 * @property EventMutasiMasuk $eventMutasiMasuk
 * @property SuratWarga[] $suratWargas
 * @property TagihanWarga[] $tagihanWargas
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
            [['nik', 'no_kk', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'golongan_darah', 'agama', 'status_nikah', 'status_keluarga', 'pendidikan', 'pekerjaan', 'nama_ayah', 'nama_ibu', 'rt', 'rw', 'warga_negara'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['rt', 'rw'], 'integer'],
            [['nik', 'no_kk', 'nama', 'tempat_lahir', 'status_nikah', 'status_keluarga', 'pendidikan', 'pekerjaan', 'warga_negara'], 'string', 'max' => 25],
            [['jenis_kelamin', 'golongan_darah'], 'string', 'max' => 2],
            [['agama'], 'string', 'max' => 15],
            [['nama_ayah', 'nama_ibu'], 'string', 'max' => 50],
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
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'golongan_darah' => 'Golongan Darah',
            'agama' => 'Agama',
            'status_nikah' => 'Status',
            'status_keluarga' => 'Status Keluarga',
            'pendidikan' => 'Pendidikan',
            'pekerjaan' => 'Pekerjaan',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'rt' => 'RT',
            'rw' => 'RW',
            'warga_negara' => 'Warga Negara',
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
    public function getEventKematian()
    {
        return $this->hasOne(EventKematian::className(), ['NIK' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventMutasiKeluar()
    {
        return $this->hasOne(EventMutasiKeluar::className(), ['NIK' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventMutasiMasuk()
    {
        return $this->hasOne(EventMutasiMasuk::className(), ['NIK' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratWargas()
    {
        return $this->hasMany(SuratWarga::className(), ['NIK' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagihanWargas()
    {
        return $this->hasMany(TagihanWarga::className(), ['NIK' => 'nik']);
    }

    /**
     * {@inheritdoc}
     * @return DetailAnggotaKeluargaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetailAnggotaKeluargaQuery(get_called_class());
    }
}
