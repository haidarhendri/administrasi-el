<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Surat */
?>
<div class="surat-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_surat',
            'no_surat',
            'judul',
            'isi:ntext',
        ],
    ]) ?>

</div>
