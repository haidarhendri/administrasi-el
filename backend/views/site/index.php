<?php

/* @var $this yii\web\View */

$this->title = 'Administrasi Elektronik';

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;


  $data = Yii::$app->db->createCommand('SELECT detail_anggota_keluarga.status_keluarga, COUNT(detail_anggota_keluarga.status_keluarga) AS jumlah
		FROM detail_anggota_keluarga
		group by detail_anggota_keluarga.status_keluarga')->queryAll();

  foreach($data as $values){
    $data_name[]=($values['status_keluarga']);
    $data_jumlah[]=($values['jumlah']);
  }

  // var_dump($data_name);
  // var_dump($data_jumlah);


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Data Penduduk',
        ],
        'xAxis' => [
            'categories' => [],
        ],
        'labels' => [
            'items' => [
                [
                    'html' => 'PEMROGRAMAN WEB KELOMPOK 3',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'pie',
                'name' => 'Jumlah : ',
                'data' => [
                    [
                        'name' => $data_name[0],
                        'y' => (int)$data_jumlah[0],
                        'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
                    ],
                    [
                        'name' => $data_name[1],
                        'y' => (int)$data_jumlah[1],
                        'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
                    ],
                    [
                        'name' => $data_name[2],
                        'y' => (int)$data_jumlah[2] ,
                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
                    ],
                    [
                        'name' => $data_name[3],
                        'y' => (int)$data_jumlah[3] ,
                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // Joe's color
                    ],
                    [
                        'name' => $data_name[4],
                        'y' => (int)$data_jumlah[4] ,
                        'color' => new JsExpression('Highcharts.getOptions().colors[4]'), // Joe's color
                    ],
                ],
                // 'center' => [100, 80],
                // 'size' => 100,
                'showInLegend' => true,
                'dataLabels' => [
                    'enabled' => true,
                ],
            ],
        ],
    ]
]);
?>
<div class="site-index">



</div>
