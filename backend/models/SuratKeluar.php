<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_keluar".
 *
 * @property int $id_surat_keluar
 * @property string $no_surat
 * @property string $judul
 * @property string $isi
 *
 * @property SuratKeluarWarga[] $suratKeluarWargas
 */
class SuratKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_surat', 'judul', 'isi'], 'required'],
            [['isi'], 'string'],
            [['no_surat', 'judul'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_surat_keluar' => 'Id Surat Keluar',
            'no_surat' => 'No Surat',
            'judul' => 'Judul',
            'isi' => 'Isi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluarWargas()
    {
        return $this->hasMany(SuratKeluarWarga::className(), ['id_surat_keluar' => 'id_surat_keluar']);
    }
}
