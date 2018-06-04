<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_masuk_warga".
 *
 * @property int $id_surat_masuk
 * @property string $id_user
 * @property string $tanggal_masuk
 *
 * @property SuratMasuk $suratMasuk
 * @property UserWarga $user
 */
class SuratMasukWarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_masuk_warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_surat_masuk', 'id_user', 'tanggal_masuk'], 'required'],
            [['id_surat_masuk'], 'integer'],
            [['tanggal_masuk'], 'safe'],
            [['id_user'], 'string', 'max' => 25],
            [['id_surat_masuk'], 'exist', 'skipOnError' => true, 'targetClass' => SuratMasuk::className(), 'targetAttribute' => ['id_surat_masuk' => 'id_surat_masuk']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserWarga::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_surat_masuk' => 'Id Surat Masuk',
            'id_user' => 'Id User',
            'tanggal_masuk' => 'Tanggal Masuk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratMasuk()
    {
        return $this->hasOne(SuratMasuk::className(), ['id_surat_masuk' => 'id_surat_masuk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserWarga::className(), ['id_user' => 'id_user']);
    }
}
