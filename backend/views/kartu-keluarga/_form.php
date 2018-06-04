<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use app\models\Provinsi;
use app\models\Kabupaten;
use app\models\Kecamatan;
use app\models\Kelurahan;

/* @var $this yii\web\View */
/* @var $model app\models\KartuKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kartu-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_provinsi')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Provinsi::find()->all(),'id_provinsi','nama_provinsi'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Provinsi',
        'onchange'=>'
                $.post( "index.php?r=kabupaten/lists&id="+$(this).val(), function( data ) {
                  $( "select#kartukeluarga-id_kabupaten" ).html( data );
                });'
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'id_kabupaten')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Kabupaten::find(),'id_kabupaten','nama_kabupaten'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Kabupaten',
        'onchange'=>'
                $.post( "index.php?r=kecamatan/lists&id="+$(this).val(), function( data ) {
                  $( "select#kartukeluarga-id_kecamatan" ).html( data );
                });'
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'id_kecamatan')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Kecamatan::find(),'id_kecamatan','nama_kecamatan'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Kecamatan',
        'onchange'=>'
                $.post( "index.php?r=kelurahan/lists&id="+$(this).val(), function( data ) {
                  $( "select#kartukeluarga-id_kelurahan" ).html( data );
                });'
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'id_kelurahan')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Kelurahan::find(),'id_kelurahan','nama_kelurahan'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Kelurahan',
        // 'onchange'=>'
        //         $.post( "index.php?r=kelurahan/lists&id="+$(this).val(), function( data ) {
        //           $( "select#kartukeluarga-id_kelurahan" ).html( data );
        //         });'
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kepala_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
