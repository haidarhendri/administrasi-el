<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Informatika Uns</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'MENU UTAMA', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'home', 'url' => Yii::$app->homeUrl],
                    [
                        'label' => 'Kependudukan',
                        'icon' => 'user',
                        'url' => '#',
                        'items' => [                    
                            ['label' => 'Kartu Keluarga', 'icon' => 'circle-o', 'url' => ['/kartu-keluarga']],
                            ['label' => 'Data Penduduk', 'icon' => 'circle-o', 'url' => ['/detail-anggota-keluarga']],
                            // ['label' => 'Warga', 'icon' => 'circle-o', 'url' => ['/user-warga']],
                        ], 
                    ],
                    // ['label' => 'Data Provinsi', 'icon' => 'location-arrow', 'url' => ['/data-provinsi']],
                    ['label' => 'Kematian', 'icon' => 'home', 'url' => ['/event-kematian']],
                    ['label' => 'Mutasi', 'icon' => 'address-card', 'url' => ['#'],
                        'items' => [                    
                            ['label' => 'Mutasi Masuk', 'icon' => 'circle-o', 'url' => ['/event-mutasi-masuk']],
                            ['label' => 'Mutasi Keluar', 'icon' => 'circle-o', 'url' => ['/event-mutasi-keluar']]
                        ], 
                        ],

                    [
                        'label' => 'Surat Warga',
                        'icon' => 'envelope',
                        'url' => '#',
                        'items' => [                    
                            ['label' => 'Jenis Surat', 'icon' => 'circle-o', 'url' => ['/surat']],
                            ['label' => 'Surat Warga', 'icon' => 'circle-o', 'url' => ['/surat-warga']],
                        ], 
                    ],
                    // [
                    //     'label' => 'Surat Keluar',
                    //     'icon' => 'envelope-open',
                    //     'url' => '#',
                    //     'items' => [                    
                    //         ['label' => 'Surat Keluar', 'icon' => 'circle-o', 'url' => ['/surat-keluar']],
                    //         ['label' => 'Surat Keluar Warga', 'icon' => 'circle-o', 'url' => ['/surat-keluar-warga']],
                    //     ], 
                    // ],
                    [
                        'label' => 'Tagihan',
                        'icon' => 'money',
                        'url' => '#',
                        'items' => [                    
                            ['label' => 'Tagihan', 'icon' => 'circle-o', 'url' => ['/tagihan']],
                            ['label' => 'Tagihan Warga', 'icon' => 'circle-o', 'url' => ['/tagihan-warga']],
                        ], 
                    ],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],

                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>
