<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\DetailAnggotaKeluarga;
use yii\web\JsExpression;

$url = \yii\helpers\Url::to(['city-list']);

/* @var $this yii\web\View */
/* @var $model app\models\EventMutasiKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-mutasi-keluar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NIK')-> widget(Select2::classname(), [
        'data' => ArrayHelper::map(DetailAnggotaKeluarga::find()->all(),'nik','nama'),
        'language' => 'id',
        'options' => ['placeholder' => 'Masukkan Nama',
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

     ?>

     <?= $form->field($model, 'jenis_mutasi')->widget(Select2::classname(), [
         'data' => [
             'Kepala keluarga dan seluruh anggota keluarga' => 'Kepala keluarga dan seluruh anggota keluarga',
             'Anggota keluarga' => 'Anggota keluarga'
         ],
         'language' => 'id',
         'options' => ['placeholder' => 'Pilih Jenis Mutasi',
         ],
         'pluginOptions' => [
             'allowClear' => true
         ],
     ]);
     ?>

     <?= $form->field($model, 'klasifikasi_mutasi')->widget(Select2::classname(), [
         'data' => [
             'dalam satu Kelurhan' => 'dalam satu Kelurhan',
             'antar Kelurahan dalam satu Kecamatan' => 'antar Kelurahan dalam satu Kecamatan',
             'antar Kecamatan dalam satu Kabupaten' => 'antar Kecamatan dalam satu Kabupaten',
             'antar Kabupaten/Kota dalam satu Provinsi' => 'antar Kabupaten/Kota dalam satu Provinsi',
             'antar Provinsi dalam satu wilayah Indonesia' => 'antar Provinsi dalam satu wilayah Indonesia'
         ],
         'language' => 'id',
         'options' => ['placeholder' => 'Pilih Klasifikasi Mutasi',
         ],
         'pluginOptions' => [
             'allowClear' => true
         ],
     ]);
     ?>

     <?= $form->field($model, 'tanggal_proses')->widget(DatePicker::classname(), [
         'options' => ['placeholder' => 'Pilih Tanggal Proses'],
         'pluginOptions' => [
             'autoclose'=>true,
             'todayHighlight' => true,
             'format' => 'yyyy-mm-dd'
         ]
     ]);
     ?>

     <?= $form->field($model, 'id_kelurahan_baru')->widget(Select2::classname(), [
         'initValueText' => '', // set the initial display text
         'options' => ['placeholder' => 'Pilih Kelurahan'],
         'pluginOptions' => [
             'allowClear' => true,
             'minimumInputLength' => 3,
             'language' => [
                 'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
             ],
             'ajax' => [
                 'url' => $url,
                 'dataType' => 'json',
                 'data' => new JsExpression('function(params) { return {q:params.term}; }')
             ],
         ],
     ]);
     ?>

    <?= $form->field($model, 'rt_baru')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'rw_baru')->textInput(['maxlength' => 3]) ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
