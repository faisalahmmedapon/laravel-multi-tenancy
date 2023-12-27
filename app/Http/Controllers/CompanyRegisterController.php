<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRegisterRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;

class CompanyRegisterController extends Controller
{
    public function company_register(){
        return view('company.register');

    }
    public function company_store(CompanyRegisterRequest $request){


        // return $request->all();

        $tenant = Tenant::create($request->validated());

        $tenant->createDomain(['domain'=>$request->domain]);

        return 'done';

    }
}