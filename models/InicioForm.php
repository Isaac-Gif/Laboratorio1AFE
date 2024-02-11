<?php

namespace app\models;

use Yii;
use yii\base\Model;

class InicioForm extends Model
{
    public $valor_a;
    public $valor_b;
    public $valor_operador;

    public function rules(
)
    {
        return [
            [['valor_a', 'valor_b' , 'valor_operador'], 'required'],
            [['valor_a', 'valor_b'], 'number'],
        ];
    }
}