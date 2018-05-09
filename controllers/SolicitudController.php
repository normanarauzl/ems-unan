<?php

namespace app\controllers;

use app\models\DetalleSolicitud;
use app\models\Equipo;
use app\models\User;
use Yii;
use app\models\Solicitud;
use app\models\SolicitudSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ListaEquipos;
use yii\helpers\Json;
use app\models\Persona;
use app\models\ListaPeriodos;

/**
 * SolicitudController implements the CRUD actions for Solicitud model.
 */
class SolicitudController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionDatosEquipo($IdEquipo)
    {
        $json = ListaEquipos::findOne(['Id'=>$IdEquipo]);
        return Json::encode($json);
    }

    /**
     * Lists all Solicitud models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SolicitudSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPeriodos($IdTurno)
    {
        $turnos = ListaPeriodos::find()
            ->where(['IdTurno'=>$IdTurno])
            ->asArray()
            ->all()
            ;

        if (count($turnos)!=0)
        {
            foreach ($turnos as $turno)
            {
                echo "<option value ='".$turno['Id']."'>".$turno['DescripcionCompleta']."</option>";
            }
        }
        else {
            echo "<option>-</option>";
        }
    }

    /**
     * Displays a single Solicitud model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Solicitud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    private function GuardarDetalle($detalleSolicitud, $IdSolicitud)
    {
        foreach ($detalleSolicitud as $key =>$value)
        {
            $model = new DetalleSolicitud();
            $model['IdSolicitud'] = $IdSolicitud;
            $model['IdEquipo'] = $value['IdEquipo'];
            $model->save();
            $this->CambiarEstadoEquipo($model['IdEquipo'], 'Prestado');
        }
    }

    private function CambiarEstadoEquipo($IdEquipo, $Estado)
    {
        $Equipo = Equipo::findOne(['Id'=>$IdEquipo]);
        $Estado == 'Disponible' ? $Equipo->Prestado = 0 : $Equipo->Prestado = 1;
        $Equipo->save();
    }

    private function eliminarDetalle($detalleOld, $detalleCurrent)
    {
        $IdOld = $this->ResultId($detalleOld);
        $IdCurrent = $this->ResultId($detalleCurrent);

        $detalleEliminar = array_diff($IdOld, $IdCurrent);

        if(count($detalleEliminar)!=0){
            DetalleSolicitud::deleteAll(['Id'=>$detalleEliminar]);
        }

        foreach ($detalleOld as $key =>$value)
        {
            $this->CambiarEstadoEquipo($value['IdEquipo'], 'Disponible');
        }
    }

    private function ResultId($array)
    {
        $Result = [];

        foreach($array as $key => $value){
            $Result[$key] = $value['Id'];
        }

        return $Result;
    }

    private function ActualizarDetalle($detalleSolicitud, $model)
    {
        $detalleOld = [];
        $detalleCurrent = [];
        $detalleEntrada =[];

        if (count($model->detalleSolicituds)>0){
            $detalleAsString = Json::encode($model->detalleSolicituds);
            $detalleOld = Json::decode($detalleAsString);
        }

        foreach($detalleSolicitud as $key => $value){
            if (count($value) < 7){
                $detalleEntrada[$key] = $value;
            }
            else $detalleCurrent[$key] = $value;
        }

        if (count($detalleEntrada)!=0)
            $this->GuardarDetalle($detalleEntrada, $model->Id);

        $this->eliminarDetalle($detalleOld, $detalleCurrent);
    }

    public function actionCreate()
    {
        $model = new Solicitud();
        $persona = Persona::findOne(['IdUsuario'=>Yii::$app->user->identity->id])->toArray();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $post = Yii::$app->request->post();

            $model->IdPersona = $persona['Id'];
            $model->Estado = 'Prestado';
            $model->save();

            $this->GuardarDetalle(Json::decode($post['detalleSolicitud']), $model->Id);

            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
                'model' => $model, 'persona'=>$persona
            ]);
        }
    }

    /**
     * Updates an existing Solicitud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $persona = Persona::findOne(['IdUsuario'=>Yii::$app->user->identity->id])->toArray();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $post = Yii::$app->request->post();
            $this->ActualizarDetalle(Json::decode($post['detalleSolicitud']), $model);
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model, 'persona'=>$persona
            ]);
        }
    }

    /**
     * Deletes an existing Solicitud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Solicitud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Solicitud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Solicitud::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
