<?php


class UpdateUserDataPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->submitForm('.login', ['userName' => '1111', 'userPassword' => '1111']);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function updateUserTest(AcceptanceTester $I)
    {
        $I->expect('Update data user');
        $I->amOnPage('/adminPanel/');
        $I->submitForm('.userData', ['newUserName' => '1111']);
        $I->see('Hello 1111 !');
    }
}
