<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratWarga */
?>
<div class="surat-warga-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_surat',
            'NIK',
            'tanggal_proses',
        ],
    ]) ?>

</div>
