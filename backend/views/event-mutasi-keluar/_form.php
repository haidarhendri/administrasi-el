<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventMutasiKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-mutasi-keluar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NIK')-> widget(Select2::classname(), [
        'data' => ArrayHelper::map(DetailAnggotaKeluarga::find()->all(),'nik','nama'),
        'language' => 'id',
        'options' => ['placeholder' => 'masukan nama',
        'onchange'=>''
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

     ?>

    <?= $form->field($model, 'jenis_mutasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'klasifikasi_mutasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_proses')->textInput() ?>

    <?= $form->field($model, 'id_kelurahan_baru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt_baru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw_baru')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
