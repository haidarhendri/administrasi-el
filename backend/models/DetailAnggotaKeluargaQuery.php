<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DetailAnggotaKeluarga]].
 *
 * @see DetailAnggotaKeluarga
 */
class DetailAnggotaKeluargaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DetailAnggotaKeluarga[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DetailAnggotaKeluarga|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
