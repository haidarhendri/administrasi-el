<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Provinsi */
?>
<div class="provinsi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_provinsi',
            'nama_provinsi:ntext',
        ],
    ]) ?>

</div>
