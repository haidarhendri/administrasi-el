<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserWarga */
?>
<div class="user-warga-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_user',
            'nama_user',
            'password',
            'status_jabatan',
            'nama_kepala_keluarga',
            'alamat',
            'kode_pos',
        ],
    ]) ?>

</div>
