<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tagihan_warga".
 *
 * @property int $id
 * @property string $NIK
 * @property string $id_tagihan
 * @property int $bulan_tunggakan
 *
 * @property Tagihan $tagihan
 * @property DetailAnggotaKeluarga $nIK
 */
class TagihanWarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan_warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIK', 'id_tagihan', 'bulan_tunggakan'], 'required'],
            [['bulan_tunggakan'], 'integer'],
            [['NIK', 'id_tagihan'], 'string', 'max' => 25],
            [['id_tagihan'], 'exist', 'skipOnError' => true, 'targetClass' => Tagihan::className(), 'targetAttribute' => ['id_tagihan' => 'id_tagihan']],
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
            'NIK' => 'Nik',
            'id_tagihan' => 'Id Tagihan',
            'bulan_tunggakan' => 'Bulan Tunggakan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagihan()
    {
        return $this->hasOne(Tagihan::className(), ['id_tagihan' => 'id_tagihan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIK()
    {
        return $this->hasOne(DetailAnggotaKeluarga::className(), ['nik' => 'NIK']);
    }
}
