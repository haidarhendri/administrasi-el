<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratWarga */
?>
<div class="surat-warga-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_surat_masuk',
            'NIK',
            'tanggal_masuk',
        ],
    ]) ?>

</div>
