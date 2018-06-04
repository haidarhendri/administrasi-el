<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
?>
<div class="surat-masuk-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_surat_masuk',
            'no_surat',
            'judul',
            'isi:ntext',
        ],
    ]) ?>

</div>
