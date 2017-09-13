<?php


class AddPostPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->submitForm('.login', ['userName' => 'aaa', 'userPassword' => 'aaa']);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function SuccessAddingTest(AcceptanceTester $I)
    {
        $I->expect('Success Add post');
        $I->amOnPage('/adminPanel/AddPost/');
        $I->fillField('title', 'OneOne');
        $I->fillField('cost', '200');
        $I->fillField('description', 'One');
        $I->selectOption('category_id', 'Eveniet.');
        $I->click('addPost');
        $I->see('Your post was added');
    }

    // tests
    public function FailAddingTest(AcceptanceTester $I)
    {
        $I->expect('Fail Add post');
        $I->amOnPage('/adminPanel/AddPost/');
        $I->fillField('title', '');
        $I->fillField('cost', '200');
        $I->fillField('description', 'One');
        $I->selectOption('category_id', 'Eveniet.');
        $I->click('addPost');
        $I->see('fill all inputs');
    }
}
