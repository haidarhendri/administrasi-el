<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tagihan */
?>
<div class="tagihan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tagihan',
            'nama_tagihan',
            'iuran_per_bulan',
        ],
    ]) ?>

</div>
