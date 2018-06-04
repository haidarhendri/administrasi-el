<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ktp */
?>
<div class="ktp-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nik',
            'no_kk',
            'masa_berlaku_ktp',
        ],
    ]) ?>

</div>
