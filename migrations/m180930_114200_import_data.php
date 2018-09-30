<?php

use yii\db\Migration;
use app\traits\Import;
/**
 * Class m180930_114200_import_data
 */
class m180930_114200_import_data extends Migration
{
    use Import;
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->importFromFile('users.json', 'user');
        $this->importFromFile('loans.json', 'loan');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('user');
        $this->delete('loan');
        return false;
    }

}
