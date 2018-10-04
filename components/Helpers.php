<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/2/2018
 * Time: 10:59 PM
 */

namespace app\components;


class Helpers
{
    /**
     * Exports age from personal code of a User
     * @param string $personal_code
     * @return integer age of a User
     */
    public static function exportAge($personal_code){
        return \DateTime::createFromFormat(
            'ymd',
            substr($personal_code, 1, 6)
        )->diff(new \DateTime('now'))->y;
    }

}