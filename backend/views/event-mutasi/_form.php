<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\EventMutasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-mutasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_event_mutasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_mutasi')->widget(Select2::classname(), [
        'data' => [
            'kepala_keluarga_all' => 'Kepala keluarga dan seluruh anggota keluarga',
            'anggota_keluarga' => 'Anggota keluarga'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Jenis Mutasi'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'klasifikasi_mutasi')->widget(Select2::classname(), [
        'data' => [
            'klasifikasi_1' => 'Dalam satu Kelurahan',
            'klasifikasi_2' => 'Antar Kelurahan dalam satu Kecamatan',
            'klasifikasi_3' => 'Antar Kecamatan dalam satu Kabupaten/Kota',
            'klasifikasi_4' => 'Antar Kabupaten/Kota dalam satu Provinsi',
            'klasifikasi_5' => 'Antar Provinsi dalam wilayah Indonesia'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Jenis Mutasi'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelurahan_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_proses')->textInput() ?>
    <?= $form->field($model, 'tanggal_proses')->widget(DatePicker::classname(), [
        'name' => 'check_issue_date', 
        'value' => date('dd-MM-YYYY', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih tanggal'],
        'pluginOptions' => [
            'format' => 'dd-MM-yyyy',
            'todayHighlight' => true
        ]
    ]);
    ?>

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
