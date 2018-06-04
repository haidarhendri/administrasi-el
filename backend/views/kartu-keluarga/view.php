<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KartuKeluarga */
?>
<div class="kartu-keluarga-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_kk',
            'id_provinsi',
            'id_kabupaten',
            'id_kecamatan',
            'id_kelurahan',
            'rt',
            'rw',
            'nama_kepala_keluarga',
            'alamat',
            'kode_pos',
        ],
    ]) ?>

</div>
