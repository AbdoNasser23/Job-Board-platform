<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{

    public function index()
    {
        Gate::authorize("viewAny", Company::class);

        if(Auth::user()->role === "admin") {
            $companies = Company::latest()->paginate(10);
        }else{
            $companies = Company::where("user_id", Auth::user()->id)->latest()->paginate(10);
        }

        return view("company.index", compact("companies"));
    }


    public function create()
    {
        Gate::authorize('create', Company::class);
        $users = User::where('role','company_owner')->get();
        return view("company.create", compact("users"));
    }


    public function store(CompanyCreateRequest $request)
    {
        Gate::authorize('create', Company::class);
        $company = new Company();

        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->industry = $request->input('industry');
        $company->website = $request->input('website');
        $company->user_id = $request->input('user_id');

        $company->save();

        return to_route('companies.index')->with('success', 'Company created successfully!');
    }


    public function show(Company $company)
    {
        Gate::authorize('view', $company);
        return view('company.show', compact('company'));
    }


    public function edit(Company $company)
    {
        Gate::authorize('update', $company);
        return view('company.edit', compact('company'));
    }


    public function update(CompanyUpdateRequest $request,  Company $company)
    {
        Gate::authorize('update', $company);
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->industry = $request->input('industry');
        $company->website = $request->input('website');

        $company->save();

        return to_route('companies.index')->with('success', 'Company updated successfully!');
    }


    public function destroy(Company $company)
    {
        Gate::authorize('delete', $company);
        $company->delete();
        return to_route('companies.archived')->with('success', 'Company archived successfully!');
    }

    public function forceDelete(Company $company)
    {
        Gate::authorize('forceDelete', $company);
        $company->forceDelete();

        return to_route('companies.index')->with('success', 'Company delete permanently!');
    }

    public function archived()
    {
        Gate::authorize('archived', Company::class);
        if(Auth::user()->role === 'admin'){
            $companies = Company::onlyTrashed()->orderByDesc('deleted_at')->paginate(10);
        }else{
            $companies = Company::onlyTrashed()->where('user_id', Auth::user()->id)->orderByDesc('deleted_at')->paginate(10);
        }

        return view('company.archived', compact('companies'));
    }

    public function restore(Company $company)
    {
        Gate::authorize('restore', $company);
        $company->restore();
        return to_route('companies.index')->with('success', 'Company Restored successfully!');
    }
}
