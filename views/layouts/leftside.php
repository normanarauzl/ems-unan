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
                <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
            </div>
        </div>
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Inicio', 'icon' => 'fa fa-gg',
                            'url' => Yii::$app->homeUrl
                        ],
                        [
                            'label' => 'Personas',
                            'icon' => 'fa fa-users',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Lista de personas', 'icon' => 'fa fa-list-ol', 'url' => ['/persona/index'],],
                                ['label' => 'Tipos de Personas', 'icon' => 'fa fa-sitemap', 'url' => ['/tipo-persona/index'],],
                                ['label' => 'Administración de Usuarios', 'icon' => 'fa fa-user', 'url' => ['/user/admin'],],
                                ['label' => 'Asignacion de permisos', 'icon' => 'fa fa-key', 'url' => ['/admin/user'],]
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        ['label' => 'Mantenimientos', 'icon' => 'fa fa-ambulance', 'url' => ['/mantenimiento/index'],
                            'visible'=>!Yii::$app->user->isGuest
                            ],
                        ['label' => 'Ubicaciones', 'icon' => 'fa fa-compass', 'url' => ['/ubicacion/index'],
                            'visible'=>!Yii::$app->user->isGuest
                            ],
                        ['label' => 'Prestamos', 'icon' => 'fa fa-sliders', 'url' => ['/prestamos/index'],
                            'visible'=>!Yii::$app->user->isGuest
                            ],
                        [
                            'label' => 'Equipos',
                            'icon' => 'fa fa-file-video-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Equipos', 'icon' => 'fa fa-video-camera', 'url' => ['/equipo/index'],],
                                ['label' => 'Tipos de equipos', 'icon' => 'fa fa-connectdevelop', 'url' => ['/tipo-equipo/index'],]
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        [
                            'label' => 'Horarios',
                            'icon' => 'fa fa-clock-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Turnos', 'icon' => 'fa fa-edit', 'url' => ['/turno/index'],],
                                ['label' => 'Periodos', 'icon' => 'fa fa-calendar', 'url' => ['/periodo/index'],]
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        ['label' => 'Solicitudes', 'icon' => 'fa fa-hand-paper-o', 'url' => ['/solicitud/index'],
                            'visible'=>!Yii::$app->user->isGuest
                            ],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],
                            'visible'=>!Yii::$app->user->isGuest
                            ],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],
                            'visible'=>!Yii::$app->user->isGuest
                            ],                    
                    ],
                ]
        )
        ?>
    </section>
    <!-- /.sidebar -->
</aside>
