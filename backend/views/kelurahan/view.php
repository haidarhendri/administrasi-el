<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kelurahan */
?>
<div class="kelurahan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kelurahan',
            'id_kecamatan',
            'nama_kelurahan',
        ],
    ]) ?>

</div>
