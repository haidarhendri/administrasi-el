<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */
?>
<div class="surat-keluar-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_surat_keluar',
            'no_surat',
            'judul',
            'isi:ntext',
        ],
    ]) ?>

</div>
