<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventMutasiKeluar */
?>
<div class="event-mutasi-keluar-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NIK',
            'jenis_mutasi',
            'klasifikasi_mutasi',
            'tanggal_proses',
            'id_kelurahan_baru',
            'rt_baru',
            'rw_baru',
        ],
    ]) ?>

</div>
