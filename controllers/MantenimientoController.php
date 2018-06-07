<?php

namespace app\controllers;

use Yii;
use app\models\Mantenimiento;
use app\models\MantenimientoSearch;
use yii\web\Controller;
use app\models\ListaEquipos;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Persona;
use app\models\MovimientoMantenimiento;
use app\models\Equipo;

/**
 * MantenimientoController implements the CRUD actions for Mantenimiento model.
 */
class MantenimientoController extends Controller
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
     * Lists all Mantenimiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MantenimientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mantenimiento model.
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
     * Creates a new Mantenimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    private function GuardarDetalle($movimientoMantenimiento, $IdMantenimiento)
    {
        foreach ($movimientoMantenimiento as $key =>$value)
        {
            $model = new MovimientoMantenimiento();
            $model['IdMantenimiento'] = $IdMantenimiento;
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
            MovimientoMantenimiento::deleteAll(['Id'=>$detalleEliminar]);
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

    private function ActualizarDetalle($movimientoMantenimiento, $model)
    {
        $detalleOld = [];
        $detalleCurrent = [];
        $detalleEntrada =[];

        if (count($model->$movimientoMantenimientos)>0){
            $detalleAsString = Json::encode($model->$movimientoMantenimientos);
            $detalleOld = Json::decode($detalleAsString);
        }

        foreach($movimientoMantenimiento as $key => $value){
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
        $model = new Mantenimiento();
        $persona = Persona::findOne(['IdUsuario'=>Yii::$app->user->identity->id])->toArray(); //aqui va quien envia a mantenimiento

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $post = Yii::$app->request->post();
            $model->IdAyudante = $persona['Id'];
            //$model->Estado = 'Prestado';
            $model->save();

            $this->GuardarDetalle(Json::decode($post['movimientoMantenimiento']), $model->Id);

            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
                'model' => $model, 'persona'=>$persona
            ]);
        }

    }

    /**
     * Updates an existing Mantenimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     *
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
    return $this->redirect(['view', 'id' => $model->Id]);
    } else {
    return $this->render('update', [
    'model' => $model,
    ]);
    }
     *
     *
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $persona = Persona::findOne(['IdUsuario'=>Yii::$app->user->identity->id])->toArray();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $post = Yii::$app->request->post();
            $this->ActualizarDetalle(Json::decode($post['movimientoMantenimiento']), $model);
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model, 'persona'=>$persona
            ]);
        }


    }

    /**
     * Deletes an existing Mantenimiento model.
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
     * Finds the Mantenimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mantenimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mantenimiento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
