<?php
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('I want to view my profile');

$I->SignIn();
$I->postAStatus('My new status');

$I->click('Your profile');
$I->seeCurrentUrlEquals('/@Foobar');

$I->see('My new status');