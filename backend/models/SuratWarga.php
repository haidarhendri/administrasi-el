<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_warga".
 *
 * @property int $id
 * @property int $id_surat
 * @property string $NIK
 * @property string $tanggal_proses
 *
 * @property Surat $surat
 * @property DetailAnggotaKeluarga $nIK
 */
class SuratWarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_surat', 'NIK', 'tanggal_proses'], 'required'],
            [['id_surat'], 'integer'],
            [['tanggal_proses'], 'safe'],
            [['NIK'], 'string', 'max' => 25],
            [['id_surat'], 'exist', 'skipOnError' => true, 'targetClass' => Surat::className(), 'targetAttribute' => ['id_surat' => 'id_surat']],
            [['NIK'], 'exist', 'skipOnError' => true, 'targetClass' => DetailAnggotaKeluarga::className(), 'targetAttribute' => ['NIK' => 'nik']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_surat' => 'Id Surat',
            'NIK' => 'Nik',
            'tanggal_proses' => 'Tanggal Proses',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurat()
    {
        return $this->hasOne(Surat::className(), ['id_surat' => 'id_surat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIK()
    {
        return $this->hasOne(DetailAnggotaKeluarga::className(), ['nik' => 'NIK']);
    }
}
