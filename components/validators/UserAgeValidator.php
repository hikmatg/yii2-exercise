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
use app\models\User;



class UserAgeValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function validateValue($user_id)
    {
        $user = User::findOne($user_id);
        if(Helpers::exportAge(strval($user->personal_code)) >= \Yii::$app->params['minimumLoanAge']){
            return null;
        }
        return [
            'User must be at least {age} to get loan.', ['age' => \Yii::$app->params['minimumLoanAge']]
        ];
    }
}