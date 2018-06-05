<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\date\DatePicker;
use app\models\DetailAnggotaKeluarga;
use yii\web\JsExpression;

$url = \yii\helpers\Url::to(['city-list']);

/* @var $this yii\web\View */
/* @var $model app\models\EventKematian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-kematian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NIK')-> widget(Select2::classname(), [
        'data' => ArrayHelper::map(DetailAnggotaKeluarga::find()->all(),'nik','nama'),
        'language' => 'id',
        'options' => ['placeholder' => 'Masukkan NIK',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

    <?= $form->field($model, 'tempat_meninggal')->widget(Select2::classname(), [
        'initValueText' => '', // set the initial display text
        'options' => ['placeholder' => 'Pilih Kota/Kabupaten'],
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
            // 'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            // 'templateResult' => new JsExpression('function(city) { return city.text; }'),
            // 'templateSelection' => new JsExpression('function (city) { return city.text; }'),
        ],
    ]);
    ?>

    <?= $form->field($model, 'sebab_meninggal')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'tanggal_kematian')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal Kematian'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]);
    ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
