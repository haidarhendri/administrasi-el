<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\date\DatePicker;
use app\models\KartuKeluarga;
use yii\web\JsExpression;

$url = \yii\helpers\Url::to(['city-list']);

/* @var $this yii\web\View */
/* @var $model app\models\DetailAnggotaKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-anggota-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => 16 ]) ?>

    <?= $form->field($model, 'no_kk')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(KartuKeluarga::find()->all(),'no_kk','no_kk'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Nomor Kartu Keluarga',
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), [
        'data' => [
            'L' => 'Laki-Laki',
            'P' => 'Perempuan'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Jenis Kelamin',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'tempat_lahir')->widget(Select2::classname(), [
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

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal Lahir'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'golongan_darah')->widget(Select2::classname(), [
        'data' => [
            'A' => 'A',
            'B' => 'B',
            'O' => 'O',
            'AB' => 'AB'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Golongan Darah',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'agama')->widget(Select2::classname(), [
        'data' => [
            'Islam' => 'Islam',
            'Kristen' => 'Kristen',
            'Katolik' => 'Katolik',
            'Hindu' => 'Hindu',
            'Budha' => 'Budha',
            'Kong Hu Cu' => 'Kong Hu Cu'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Agama',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'status_nikah')->widget(Select2::classname(), [
        'data' => [
            'Kawin' => 'Kawin',
            'Belum Kawin' => 'Belum Kawin',
            'Cerai Hidup' => 'Cerai Hidup',
            'Cerai Mati' => 'Cerai Mati'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Status Nikah',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'status_keluarga')->widget(Select2::classname(), [
        'data' => [
            'Kepala Keluarga' => 'Kepala Keluarga',
            'Istri' => 'Istri',
            'Anak' => 'Anak',
            'Cucu' => 'Cucu',
            'Saudara lain' => 'Saudara lain',
            'Lainnya' => 'Lainnya'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Status Keluarga',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'pendidikan')->widget(Select2::classname(), [
        'data' => [
            'Tidak / Belum Sekolah' => 'Tidak / Belum Sekolah',
            'Belum Tamat SD / Sederajat' => 'Belum Tamat SD / Sederajat',
            'Tamat SD / Sederajat' => 'Tamat SD / Sederajat',
            'SLTP / Sederajat' => 'SLTP / Sederajat',
            'SLTA / Sederajat' => 'SLTA / Sederajat',
            'Diploma I / II' => 'Diploma I / II',
            'Akademi / Diploma III / Sarjana Muda' => 'Akademi / Diploma III / Sarjana Muda',
            'Diploma IV / Strata I' => 'Diploma IV / Strata I',
            'Strata II' => 'Strata II',
            'Strata III' => 'Strata III'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Pendidikan',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'pekerjaan')->widget(Select2::classname(), [
        'data' => [
            'Belum / Tidak Bekerja' => 'Belum / Tidak Bekerja',
            'Mengurus Rumah Tangga' => 'Mengurus Rumah Tangga',
            'Pelajar / Mahasiswa' => 'Pelajar / Mahasiswa',
            'Pensiunan' => 'Pensiunan',
            'Pegawai Negeri Sipil' => 'Pegawai Negeri Sipil',
            'Tentara Nasional Indonesia' => 'Tentara Nasional Indonesia',
            'Kepolisian RI' => 'Kepolisian RI',
            'Perdagangan' => 'Perdagangan',
            'Petani / Pekebun' => 'Petani / Pekebun',
            'Peternak' => 'Peternak',
            'Nelayan / Perikanan' => 'Nelayan / Perikanan',
            'Industri' => 'Industri',
            'Konstruksi' => 'Konstruksi',
            'Transportasi' => 'Transportasi',
            'Karyawan Swasta' => 'Karyawan Swasta',
            'Karyawan BUMN' => 'Karyawan BUMN',
            'Karyawan BUMD' => 'Karyawan BUMD',
            'Karyawan Honorer' => 'Karyawan Honorer',
            'Buruh Harian Lepas' => 'Buruh Harian Lepas',
            'Buruh Tani / Perkebunan' => 'Buruh Tani / Perkebunan',
            'Buruh Nelayan / Perikanan' => 'Buruh Nelayan / Perikanan',
            'Buruh Peternakan' => 'Buruh Peternakan',
            'Pembantu Rumah Tangga' => 'Pembantu Rumah Tangga',
            'Tukang Cukur' => 'Tukang Cukur',
            'Tukang Listrik' => 'Tukang Listrik',
            'Tukang Batu' => 'Tukang Batu',
            'Tukang Kayu' => 'Tukang Kayu',
            'Tukang Sol Sepatu' => 'Tukang Sol Sepatu',
            'Tukang Las / Pandai Besi' => 'Tukang Las / Pandai Besi',
            'Tukang Jahit' => 'Tukang Jahit',
            'Penata Rambut' => 'Penata Rambut',
            'Penata Rias' => 'Penata Rias',
            'Penata Busana' => 'Penata Busana',
            'Mekanik' => 'Mekanik',
            'Tukang Gigi' => 'Tukang Gigi',
            'Seniman' => 'Seniman',
            'Tabib' => 'Tabib',
            'Paraji' => 'Paraji',
            'Perancang Busana' => 'Perancang Busana',
            'Penterjemah' => 'Penterjemah',
            'Imam Masjid' => 'Imam Masjid',
            'Pendeta' => 'Pendeta',
            'Pastur' => 'Pastur',
            'Wartawan' => 'Wartawan',
            'Ustadz / Mubaligh' => 'Ustadz / Mubaligh',
            'Juru Masak' => 'Juru Masak',
            'Promotor Acara' => 'Promotor Acara',
            'Anggota DPR-RI' => 'Anggota DPR-RI',
            'Anggota DPD' => 'Anggota DPD',
            'Anggota BPK' => 'Anggota BPK',
            'Presiden' => 'Presiden',
            'Wakil Presiden' => 'Wakil Presiden',
            'Anggota Mahkamah Konstitusi' => 'Anggota Mahkamah Konstitusi',
            'Anggota Kabinet / Kementerian' => 'Anggota Kabinet / Kementerian',
            'Duta Besar' => 'Duta Besar',
            'Gubernur' => 'Gubernur',
            'Wakil Gubernur' => 'Wakil Gubernur',
            'Bupati' => 'Bupati',
            'Wakil Bupati' => 'Wakil Bupati',
            'Walikota' => 'Walikota',
            'Wakil Walikota' => 'Wakil Walikota',
            'Anggota DPRD Propinsi' => 'Anggota DPRD Propinsi',
            'Anggota DPRD Kabupaten / Kota' => 'Anggota DPRD Kabupaten / Kota',
            'Dosen' => 'Dosen',
            'Guru' => 'Guru',
            'Pilot' => 'Pilot',
            'Pengacara' => 'Pengacara',
            'Notaris' => 'Notaris',
            'Arsitek' => 'Arsitek',
            'Akuntan' => 'Akuntan',
            'Konsultan' => 'Konsultan',
            'Dokter' => 'Dokter',
            'Bidan' => 'Bidan',
            'Perawat' => 'Perawat',
            'Apoteker' => 'Apoteker',
            'Psikiater / Psikolog' => 'Psikiater / Psikolog',
            'Penyiar Televisi' => 'Penyiar Televisi',
            'Penyiar Radio' => 'Penyiar Radio',
            'Pelaut' => 'Pelaut',
            'Peneliti' => 'Peneliti',
            'Sopir' => 'Sopir',
            'Pialang' => 'Pialang',
            'Paranormal' => 'Paranormal',
            'Pedagang' => 'Pedagang',
            'Perangkat Desa'=> 'Perangkat Desa',
            'Kepala Desa' => 'Kepala Desa',
            'Biarawati' => 'Biarawati',
            'Wiraswasta' => 'Wiraswasta'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Nomor Kartu Keluarga',
            ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'warga_negara')->widget(Select2::classname(), [
        'data' => [
            'Indonesia' => 'Indoensia',
            'Asing' => 'Asing',
            'Lainnya' => 'Lainnya'
        ],
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih  Warga Negara',
        ],
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
