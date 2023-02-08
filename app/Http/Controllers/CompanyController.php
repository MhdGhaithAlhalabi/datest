<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyEditRequest;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('Companies.companiesStore');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CompanyStoreRequest $request)
    {
        $validated = $request->validated();
              // Handle File Upload
               if($request->hasFile('logo')) {
                   // Get filename with the extension
                   $filenameWithExt = $request->file('logo')->getClientOriginalName();
                   // Get just filename
                   $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                   // Get just ext
                   $extension = $request->file('logo')->getClientOriginalExtension();
                   // Filename to store
                   $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                   // Upload Image
                   $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
               }
        $company = Company::create([
            'name' => $request->name,
            'email' =>$request->email ,
            'logo' =>$fileNameToStore ,
            'website' =>$request->website
        ]);
        return redirect()->back()->with([
            'message' => 'success']);
           }

           /**
            * Show the form for editing the specified resource.
            *
            * @param Company $company
            * @return Application|Factory|View
            */
    public function edit(Company $company)
    {
        return view('Companies.companiesEdit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyEditRequest $request, Company $company)
    {

        $validated = $request->validated();
        // Handle File Upload
        if($request->hasFile('logo')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
        }else{
            $fileNameToStore = $company->logo;
        }
        $company->update([
             'name'=>$request->name,
             'email'=>$request->email,
             'logo'=>$fileNameToStore,
             'website'=>$request->website,
        ]);
        return redirect()->back()->with('message','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back();
    }
}
