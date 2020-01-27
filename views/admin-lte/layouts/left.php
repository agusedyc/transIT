<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

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
        <?php 

        use app\models\User;
        use hscstudio\mimin\components\Mimin;
        $menuItems = [
                ['label' => 'TransIT', 'options' => ['class' => 'header']],
                ['label' => 'User Management','icon' => 'user','url' => '#','items' => [
                        ['label' => 'Manage Users', 'icon' => 'users', 'url' => ['/user/admin/index'],'visible' => User::findOne(Yii::$app->user->id)->isAdmin,],
                        ['label' => 'User Account', 'icon' => 'user', 'url' => ['/user/settings/profile'],],
                        ['label' => 'Role', 'icon' => 'dashboard', 'url' => ['/mimin/role'],],
                        ['label' => 'Route', 'icon' => 'dashboard', 'url' => ['/mimin/route'],],
                    ],
                ],
                ['label' => 'Pengelola','icon' => 'book','url' => '#','items' => [
                        ['label' => 'Pembimbing', 'icon' => 'users', 'url' => ['/pembimbing/index'],],
                        ['label' => 'Jurnal', 'icon' => 'file', 'url' => ['/jurnal/index'],],
                        ['label' => 'Publikasi', 'icon' => 'files-o', 'url' => ['/publication/index'],],
                    ],
                ],
                ['label' => 'Pengajuan Jurnal','icon' => 'book','url' => '#','items' => [
                        ['label' => 'Registrasi Jurnal', 'icon' => 'files', 'url' => ['/register-jurnal/index'],],
                        // ['label' => 'Upload Jurnal', 'icon' => 'files', 'url' => ['/register-jurnal/upload'],],
                        // ['label' => 'Subject', 'icon' => 'file-code-o', 'url' => ['/subject/index'],],
                        // ['label' => 'Level', 'icon' => 'list-ol', 'url' => ['/level/index'],],
                    ],
                ],
                ['label' => 'Some tools','icon' => 'share','url' => '#','items' => [
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    ],
                ],
            ];
        $menuItems = Mimin::filterMenu($menuItems);
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
