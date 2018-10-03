<?php
namespace tests\models;
use app\models\SiteUser;

class SiteUserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = SiteUser::findIdentity(100));
        expect($user->username)->equals('admin');

        expect_not(SiteUser::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = SiteUser::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(SiteUser::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = SiteUser::findByUsername('admin'));
        expect_not(SiteUser::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = SiteUser::findByUsername('admin');
        expect_that($user->validateAuthKey('test100key'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

}
