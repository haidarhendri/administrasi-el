<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kelurahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelurahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelurahan')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
