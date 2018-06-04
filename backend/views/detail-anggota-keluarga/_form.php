<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\DetailAnggotaKeluarga;

/* @var $this yii\web\View */
/* @var $model app\models\DetailAnggotaKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-anggota-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_kk')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(DetailAnggotaKeluarga::find()->all(),'no_kk','no_kk'),
        'language' => 'id',
        'options' => ['placeholder' => 'No Kartu Keluarga',
        'onchange'=>''
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
     ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(
        ['laki-laki' => 'Laki-Laki', 'perempuan' => 'Perempuan'],
        ['prompt'=>'Pilih Jenis Kelamin']) ?>

    <?= $form->field($model, 'agama')->dropDownList(
        [
            'islam' => 'Islam',
            'kristen' => 'Kristen',
            'katolik' => 'Katolik',
            'hindu' => 'Hindu',
            'budha' => 'Budha',
            'konghucu' => 'Kong Hu Cu'
        ],
        ['prompt'=>'Pilih Agama']) ?>

    <?= $form->field($model, 'pekerjaan')->widget(Select2::classname(), [
        'data' => [
            'tidak_bekerja' => 'Belum / Tidak Bekerja',
            'mengurus_rumah_tangga' => 'Mengurus Rumah Tangga',
            'pelajar_mhs' => 'Pelajar / Mahasiswa',
            'pensiunan' => 'Pensiunan',
            'pns' => 'Pegawai Negeri Sipil',
            'tni' => 'Tentara Nasional Indonesia',
            'kepolisian_ri' => 'Kepolisian RI',
            'perdagangan' => 'Perdagangan',
            'petani_pekebun' => 'Petani / Pekebun'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Pekerjaan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
