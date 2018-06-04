<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\DetailAnggotaKeluarga;
use app\models\Surat;

/* @var $this yii\web\View */
/* @var $model app\models\SuratWarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-warga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_surat')-> widget(Select2::classname(), [
        'data' => ArrayHelper::map(Surat::find()->all(),'id_surat','judul'),
        'language' => 'id',
        'options' => ['placeholder' => 'id_surat',
        'onchange'=>''
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

     ?>

    <?= $form->field($model, 'NIK')-> widget(Select2::classname(), [
        'data' => ArrayHelper::map(DetailAnggotaKeluarga::find()->all(),'nik','nama'),
        'language' => 'id',
        'options' => ['placeholder' => 'NIK',
        'onchange'=>''
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);



    ?>

    <?= $form->field($model, 'tanggal_proses')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
