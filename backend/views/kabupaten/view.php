<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kabupaten */
?>
<div class="kabupaten-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kabupaten',
            'id_provinsi',
            'nama_kabupaten',
        ],
    ]) ?>

</div>
