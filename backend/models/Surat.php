<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat".
 *
 * @property int $id_surat
 * @property string $no_surat
 * @property string $judul
 * @property string $isi
 *
 * @property SuratWarga[] $suratWargas
 */
class Surat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat';
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
            'id_surat' => 'Id Surat',
            'no_surat' => 'No Surat',
            'judul' => 'Judul',
            'isi' => 'Isi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratWargas()
    {
        return $this->hasMany(SuratWarga::className(), ['id_surat' => 'id_surat']);
    }
}
