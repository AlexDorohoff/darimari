<?php

namespace frontend\controllers;

use common\models\AddressModel;
use frontend\services\AddressService;
use frontend\services\OrderService;
use Yii;
use common\models\ClientModel;
use yii\base\ViewRenderer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientController implements the CRUD actions for ClientModel model.
 */
class ClientController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all ClientModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ClientModel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClientModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $orders = OrderService::getAllClientOrders($id);
        $address = AddressService::getAllClinetsAdresses($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'orders' => $orders,
            'addresses' => $address,
        ]);
    }

    /**
     * Creates a new ClientModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClientModel();
        $address = new AddressModel();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $address->load(Yii::$app->request->post());
            $address->id_client = $model->id_client;
            if ($address->save()) {
                return $this->redirect(['view', 'id' => $model->id_client]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'address' => $address,
        ]);
    }

    /**
     * Updates an existing ClientModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = ClientModel::findOne($id);
        $addresses = AddressService::getAllClinetsAdresses($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id_client]);
        }
        return $this->render('update', [
            'model' => $model,
            'address' => $addresses,
        ]);
    }

    /**
     * Deletes an existing ClientModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClientModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
