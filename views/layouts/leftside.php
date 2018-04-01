<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('@web/img/logounan.png', ['class' => 'img-circle', 'alt' => 'Logo UNAN']) ?>
            </div>
            <div class="pull-left info">
                <p>Bienvenid@s al Sistema</p>
                <p>Reserva de Datashow</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
<!--         search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Inicio', 'icon' => 'fa fa-gg', 
                            'url' => ['/'], 'active' => $this->context->route == 'site/index'
                        ],
//                        [
//                            'label' => 'Master',
//                            'icon' => 'fa fa-database',
//                            'url' => '#',
//                            'items' => [
//                                [
//                                    'label' => 'Master1',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=master1/',
//				    'active' => $this->context->route == 'master1/index'
//                                ],
//                                [
//                                    'label' => 'Master2',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=master2/',
//				    'active' => $this->context->route == 'master2/index'
//                                ]
//                            ]
//                        ],
//                        [
//                            'label' => 'Users',
//                            'icon' => 'fa fa-users',
//                            'url' => ['/user'],
//                            'active' => $this->context->route == 'user/index',
//                        ],
                        ['label' => 'Ayudantes', 'icon' => 'fa fa-user-secret', 'url' => ['/ayudantes/index'],],
                        ['label' => 'Personas', 'icon' => 'fa fa-users', 'url' => ['/personas/index'],],
                        ['label' => 'Mantenimientos', 'icon' => 'fa fa-ambulance', 'url' => ['/mantenimiento/index'],],
                        ['label' => 'Ubicaciones', 'icon' => 'fa fa-compass', 'url' => ['/ubicaciones/index'],],
                        ['label' => 'Periodos', 'icon' => 'fa fa-clock-o', 'url' => ['/periodos/index'],],
                        ['label' => 'Prestamos', 'icon' => 'fa fa-sliders', 'url' => ['/prestamos/index'],],
                        [
                            'label' => 'Equipos',
                            'icon' => 'fa fa-file-video-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Equipos', 'icon' => 'fa fa-video-camera', 'url' => ['/equipos/index'],],
                                ['label' => 'Tipos de equipos', 'icon' => 'fa fa-connectdevelop', 'url' => ['/tipo/index'],]
                            ]
                        ],
                        ['label' => 'Solicitudes', 'icon' => 'fa fa-hand-paper-o', 'url' => ['/solicitudes/index'],],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                        
                    ],
                ]
        )
        ?>
    </section>
    <!-- /.sidebar -->
</aside>
