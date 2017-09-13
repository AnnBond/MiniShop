<?php


class SearchPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function SearchTest(AcceptanceTester $I)
    {
        $I->expect('Success Login');
        $I->amOnPage('/');
        $I->submitForm('.searchForm', ['search' => 'Quod']);
        $I->see('Your search results for: Quod');
    }
}
