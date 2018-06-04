<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventKematian */
?>
<div class="event-kematian-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NIK',
            'tempat_meninggal',
            'sebab_meninggal',
            'tanggal_kematian',
        ],
    ]) ?>

</div>
