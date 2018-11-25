<?php

namespace App\Http\Controllers\Company;


use App\Company;
use App\Http\Controllers\Controller;

/**
 * Class CompanyController
 * @package App\Http\Controllers\Company
 */
class CompanyController extends Controller
{
    /**
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Company $company)
    {
        $this->authorize('colleagues',auth()->user()->member);
        return view('company.profile',compact('company'));
    }
}
