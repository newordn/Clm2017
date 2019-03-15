<?php

namespace App\Http\Controllers;
use App\User;

use App\Repositories\LoginRepository;

use App\Http\Requests\RightRequest;

class RightController extends Controller
{

    public function setRight(RightRequest $request,LoginRepository $loginRepository)
    {
        $loginRepository->setRight($request->input('id'),$request->input('right'));
        return redirect('/administration');
    }
}