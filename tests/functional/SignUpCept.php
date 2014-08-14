<?php 
$I = new FunctionalTester($scenario);
$I->am('guest');

$I->wantTo('sign up to a larabook account');

$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:','John Doe');
$I->fillField('Email:','john@example.com');
$I->fillField('Password:','demo');
$I->fillField('Password Confirmation:','demo');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook!');
$I->seeRecord('users',[
    'username'=>'John Doe',
    'email'=>'john@example.com'
]);

$I->assertTrue(Auth::check());