<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventMutasi */
?>
<div class="event-mutasi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_event_mutasi',
            'jenis_mutasi',
            'klasifikasi_mutasi',
            'no_kk',
            'nik',
            'id_kelurahan_lama',
            'rt_lama',
            'rw_lama',
            'tanggal_proses',
            'id_kelurahan_baru',
            'rt_baru',
            'rw_baru',
        ],
    ]) ?>

</div>
