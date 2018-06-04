<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAnggotaKeluarga */
?>
<div class="detail-anggota-keluarga-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nik',
            'no_kk',
            'nama',
            'jenis_kelamin',
            'agama',
            'pekerjaan',
        ],
    ]) ?>

</div>
