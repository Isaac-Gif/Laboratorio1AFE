<?php

namespace app\controllers;

use app\models\InicioForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\Controller;

class InicioController extends Controller
{
    public function actionIndex()
    {
        $mensaje = 'Yes, it is';
        $h2 = 'UNIVO';
        $dateTime = new \DateTime();

        return $this->render(
            'index',
            [
                'mensaje' => $mensaje,
                'h2' => $h2,
                'dateTime' => $dateTime,
            ]
        );
    }

    public function actionResta()
    {
        $valor_a = 60;
        $valor_b = 8;
        $resultado = $valor_a - $valor_b;

        return $this->render('resta', ['resultado' => $resultado]);
    }

    public function actionSuma()
    {
        $model = new InicioForm();
    
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            switch ($model->valor_operador) {
                case '+':
                    $resultado = $model->valor_a + $model->valor_b;
                    break;
                case '-':
                    $resultado = $model->valor_a - $model->valor_b;
                    break;
                case '*':
                    $resultado = $model->valor_a * $model->valor_b;
                    break;
                case '/':
                    if ($model->valor_b != 0) {
                        $resultado = $model->valor_a / $model->valor_b;
                    } else {
                        $respuesta = 'No existe la division entre 0';
                        return $this->render('suma', ['model' => $model, 'respuesta' => $respuesta]);
                    }
                    break;
                default:
                    $respuesta = 'Seleccione una operacion.';
                    return $this->render('suma', ['model' => $model, 'respuesta' => $respuesta]);
            }
    
            $respuesta = "El resultado es: $resultado";
            return $this->render('suma', ['model' => $model, 'respuesta' => $respuesta]);
        }
    
        return $this->render('suma', ['model' => $model]);
    }
    
    


}