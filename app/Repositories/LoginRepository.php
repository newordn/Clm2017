<?php

namespace App\Repositories;

use App\User;

class LoginRepository implements LoginRepositoryInterface
{

    protected $account;

	public function __construct(User $account)
	{
		$this->account = $account;
	}

	public function save($account)
	{
		$userSaved = new User ;
    	$userSaved->login = $account->input('login');
    	$userSaved->password = $account->input('password');
        $this->account=$userSaved;
        $this->account->save();
	}
	public function login($form)
	{
		$user = User::where('login',$form->login)->get()->first();
		if($user == null) return 0;
		return $user->password == $form->password;
	}
}