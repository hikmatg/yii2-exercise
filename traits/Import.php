<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/30/2018
 * Time: 4:26 PM
 */

namespace app\traits;

trait Import{

    /**
     * Reads json array from file and imports it to given table
     * @param string $filePath
     * @param string $tableName
     *
     */
    public function importFromFile($filePath, $tableName){
        $objects = json_decode(file_get_contents($filePath));
        $columns = array_keys(get_object_vars($objects[0]));
        $rows = array_map(function($o) {
            return get_object_vars($o);
        }, $objects);
        $this->batchInsert($tableName, $columns, $rows);
    }

    abstract public function batchInsert();
}