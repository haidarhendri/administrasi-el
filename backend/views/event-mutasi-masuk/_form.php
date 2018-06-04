<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\DetailAnggotaKeluarga;

/* @var $this yii\web\View */
/* @var $model app\models\EventMutasiMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-mutasi-masuk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NIK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_mutasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'klasifikasi_mutasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelurahan_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_proses')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
