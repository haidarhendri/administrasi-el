<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\DetailAnggotaKeluarga;

/* @var $this yii\web\View */
/* @var $model app\models\EventKematian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-kematian-form">

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

    <?= $form->field($model, 'tempat_meninggal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sebab_meninggal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_kematian')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
