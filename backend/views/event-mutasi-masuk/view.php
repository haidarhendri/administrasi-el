<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventMutasiMasuk */
?>
<div class="event-mutasi-masuk-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NIK',
            'jenis_mutasi',
            'klasifikasi_mutasi',
            'id_kelurahan_lama',
            'rt_lama',
            'rw_lama',
            'tanggal_proses',
        ],
    ]) ?>

</div>
