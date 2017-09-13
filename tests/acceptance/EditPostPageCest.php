<?php


class EditPostPageCest
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
    public function EditPostTestTest(AcceptanceTester $I)
    {
        $I->expect('Success Edit post');
        $I->amOnPage('/posts/edit/35');

        $I->fillField('title', 'OneOned');
        $I->fillField('cost', '200');
        $I->fillField('description', 'One');
        $I->click('edit');

        $I->see('Your post was updated');
    }
}
