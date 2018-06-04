<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_warga".
 *
 * @property string $id_user
 * @property string $nama_user
 * @property string $password
 * @property string $status_jabatan
 * @property string $nama_kepala_keluarga
 * @property string $alamat
 * @property string $kode_pos
 *
 * @property SuratKeluarWarga[] $suratKeluarWargas
 * @property SuratMasukWarga[] $suratMasukWargas
 * @property TagihanWarga[] $tagihanWargas
 */
class UserWarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nama_user', 'password', 'status_jabatan', 'nama_kepala_keluarga', 'alamat', 'kode_pos'], 'required'],
            [['id_user', 'password', 'status_jabatan', 'nama_kepala_keluarga'], 'string', 'max' => 25],
            [['nama_user'], 'string', 'max' => 30],
            [['alamat'], 'string', 'max' => 50],
            [['kode_pos'], 'string', 'max' => 10],
            [['id_user'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Username',
            'nama_user' => 'Nama Lengkap',
            'password' => 'Password',
            'status_jabatan' => 'Status Jabatan',
            'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
            'alamat' => 'Alamat',
            'kode_pos' => 'Kode Pos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluarWargas()
    {
        return $this->hasMany(SuratKeluarWarga::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratMasukWargas()
    {
        return $this->hasMany(SuratMasukWarga::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagihanWargas()
    {
        return $this->hasMany(TagihanWarga::className(), ['id_user' => 'id_user']);
    }
}
