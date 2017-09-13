<?php


class RegistrationPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
  /*  public function SuccessRegistrationTest(AcceptanceTester $I)
    {
        $I->expect('Success registration');
        $I->amOnPage('/registration/');
        $I->submitForm('.registration', ['userLogin' => 'ccc', 'userPassword' => 'ccc', 'userEmail' => 'ccc']);
        $I->see('welcome ccc');
    }*/
    public function UserExistTest(AcceptanceTester $I)
    {
        $I->expect('User exist');
        $I->amOnPage('/registration/');
        $I->submitForm('.registration', ['userLogin' => 'aaa', 'userPassword' => 'aaa', 'userEmail' => 'aaa']);
        $I->see('User name is exist now');
    }

    // tests
    public function FailRegistrationTest(AcceptanceTester $I)
    {
        $I->expect('Faild registration');
        $I->amOnPage('/registration/');
        $I->submitForm('.registration', ['userLogin' => '', 'userPassword' => 'aaa', 'userEmail' => 'aaa']);
        $I->see('Not enough data');
    }
}
