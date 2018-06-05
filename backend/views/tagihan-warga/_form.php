<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\DetailAnggotaKeluarga;
use app\models\Tagihan;

/* @var $this yii\web\View */
/* @var $model app\models\TagihanWarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tagihan-warga-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'id_tagihan')-> widget(Select2::classname(), [
        'data' => ArrayHelper::map(Tagihan::find()->all(),'id_tagihan','nama_tagihan'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Nama Tagihan',
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

    <?= $form->field($model, 'bulan_tunggakan')->textInput() ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
