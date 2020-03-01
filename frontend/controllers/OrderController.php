<?php

namespace frontend\controllers;

use frontend\models\ClientModel;
use frontend\models\ProductModel;
use frontend\models\ProductXOrderModel;
use frontend\services\ClientService;
use frontend\services\OrderService;
use Yii;
use frontend\models\OrderModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for OrderModel model.
 */
class OrderController extends Controller
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
     * Lists all OrderModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrderModel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     *
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $order = OrderModel::findOne($id);
        $products = ProductXOrderModel::getProductsByOrder($id);
        return $this->render('view', [
            'model' => $order,
            'products' => $products
        ]);
    }

    /**
     *
     * @param null $id_client
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_client = null)
    {
        $order = new OrderModel();
        $productXOrder = new ProductXOrderModel();
        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            $productXOrder->load(Yii::$app->request->post());
            $productXOrder->id_order = $order->id_order;
            if ($productXOrder->save()) {
                return $this->redirect(['view', 'id' => $order->id_order]);
            }
        }

        return $this->render('create', [
            'order' => $order,
            'id_client' => $id_client,
            'productXOrder' => $productXOrder,
        ]);
    }

    /**
     * Updates an existing OrderModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id_client = null)
    {
        $order = $this->findModel($id);
        $productXOrder = ProductXOrderModel::getProductsByOrder($id);
        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            return $this->redirect(['view', 'id' => $order->id_order]);
        }

        return $this->render('update', [
            'order' => $order,
            'id_client' => $id_client,
            'productXOrder' => $productXOrder,
        ]);
    }

    /**
     * Deletes an existing OrderModel model.
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
     * Finds the OrderModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
