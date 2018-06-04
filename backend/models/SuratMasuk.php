<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_masuk".
 *
 * @property int $id_surat_masuk
 * @property string $no_surat
 * @property string $judul
 * @property string $isi
 *
 * @property SuratMasukWarga[] $suratMasukWargas
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_masuk';
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
            'id_surat_masuk' => 'Id Surat Masuk',
            'no_surat' => 'No Surat',
            'judul' => 'Judul',
            'isi' => 'Isi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratMasukWargas()
    {
        return $this->hasMany(SuratMasukWarga::className(), ['id_surat_masuk' => 'id_surat_masuk']);
    }
}
