<?php

namespace app\models;

use app\components\validators\UserAgeValidator;
use Yii;

/**
 * This is the model class for table "loan".
 *
 * @property int $id
 * @property int $user_id
 * @property string $amount
 * @property string $interest
 * @property int $duration
 * @property int $start_date
 * @property int $end_date
 * @property int $campaign
 * @property int $status
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'amount', 'interest', 'duration', 'start_date', 'end_date', 'campaign'], 'required'],
            [['user_id', 'duration', 'start_date', 'end_date', 'campaign', 'status'], 'default', 'value' => null],
            [['user_id', 'duration', 'start_date', 'end_date', 'campaign', 'status'], 'integer'],
            ['user_id', 'exist', 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            ['user_id', UserAgeValidator::className()],
            [['amount', 'interest'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'interest' => 'Interest',
            'duration' => 'Duration',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'campaign' => 'Campaign',
            'status' => 'Status',
        ];
    }
}
