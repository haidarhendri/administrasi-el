<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kecamatan */
?>
<div class="kecamatan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kecamatan',
            'id_kabupaten',
            'nama_kecamatan',
        ],
    ]) ?>

</div>
