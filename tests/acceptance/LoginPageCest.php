<?php


class LoginPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function LoginSuccess(AcceptanceTester $I)
    {
        $I->expect('Success Login');
        $I->amOnPage('/');
        $I->submitForm('.login', ['userName' => 'aaa', 'userPassword' => 'aaa']);
        $I->see('Hi aaa !');
    }
    // tests
    public function LoginFail(AcceptanceTester $I)
    {
        $I->expect('Fail Login');
        $I->amOnPage('/');
        $I->submitForm('.login', ['userName' => 'akjoiaa', 'userPassword' => 'aoijaa']);
        $I->see('Username or password are incorrect');
    }
}
