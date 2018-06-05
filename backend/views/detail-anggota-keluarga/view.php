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
            'tempat_lahir',
            'tanggal_lahir',
            'golongan_darah',
            'agama',
            'status_nikah',
            'status_keluarga',
            'pendidikan',
            'pekerjaan',
            'nama_ayah',
            'nama_ibu',
            'rt',
            'rw',
            'warga_negara',
        ],
    ]) ?>

</div>
