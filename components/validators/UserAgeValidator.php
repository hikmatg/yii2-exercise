<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/2/2018
 * Time: 11:07 PM
 */

namespace app\components\validators;

use yii\validators\Validator;
use app\components\Helpers;



class UserAgeValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function validateValue($value)
    {
        if(Helpers::exportAge($value) >= \Yii::$app->params['minimumLoanAge']){
            return null;
        }
        return [
            'User must be at least 18 to get loan.', ['age' => $value]
        ];
    }
}