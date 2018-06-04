<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_keluar_warga".
 *
 * @property int $id_surat_keluar
 * @property string $id_user
 * @property string $tanggal_keluar
 *
 * @property SuratKeluar $suratKeluar
 * @property UserWarga $user
 */
class SuratKeluarWarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_keluar_warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_surat_keluar', 'id_user', 'tanggal_keluar'], 'required'],
            [['id_surat_keluar'], 'integer'],
            [['tanggal_keluar'], 'safe'],
            [['id_user'], 'string', 'max' => 25],
            [['id_surat_keluar'], 'exist', 'skipOnError' => true, 'targetClass' => SuratKeluar::className(), 'targetAttribute' => ['id_surat_keluar' => 'id_surat_keluar']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserWarga::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_surat_keluar' => 'Id Surat Keluar',
            'id_user' => 'Id User',
            'tanggal_keluar' => 'Tanggal Keluar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluar()
    {
        return $this->hasOne(SuratKeluar::className(), ['id_surat_keluar' => 'id_surat_keluar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserWarga::className(), ['id_user' => 'id_user']);
    }
}
