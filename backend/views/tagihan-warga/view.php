<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TagihanWarga */
?>
<div class="tagihan-warga-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'NIK',
            'id_tagihan',
            'bulan_tunggakan',
        ],
    ]) ?>

</div>
