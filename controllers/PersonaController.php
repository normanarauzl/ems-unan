<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use dektrium\user\models\User;
use yii\widgets\ActiveForm;
use dektrium\user\helpers\Password;
use app\models\TipoPersona;
use dektrium\user\controllers\RegistrationController;
use dektrium\user\models\RegistrationForm;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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

    /**
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionValidation()
    {
        $user = new User;
        if (Yii::$app->request->isAjax && $user->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($user);
        }
    }

    private function FindUser($email)
    {
        return User::findOne(['email'=>$email])->id;
    }

    private function CreatePersona($post, $model, $email)
    {
        $model->attributes = $post['Persona'];
        $model->IdUsuario = $this->FindUser($email);
        $model->IdTipo = TipoPersona::findOne(['Descripcion'=>'Docente'])->Id;
        $model->save();
    }

    public function actionCreate()
    {
        $model = new Persona();
        $user = \Yii::createObject(RegistrationForm::className());

        if ($user->load(\Yii::$app->request->post()) && $user->register()) {

            $post = \Yii::$app->request->post();
            $this->CreatePersona($post,$model, $user->attributes['email']);
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
                'model' => $model, 'user'=>$user
            ]);
        }
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = User::findOne($model->IdUsuario);
        if ((Yii::$app->request->post())) {

            $post = Yii::$app->request->post();
            $model->attributes = $post['Persona'];
            $model->IdUsuario = $this->UpdateUser($post, $user);
            $model->save();
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model, 'user'=>$user
            ]);
        }
    }

    /**
     * Deletes an existing Persona model.
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
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
