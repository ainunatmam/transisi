<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::orderBy('created_at', 'desc')->paginate(5);

        return view('company.index', ['company' => $company]);
    }

    public function get_company()
    {
        $company = Company::orderBy('created_at', 'desc')->paginate(5);

        return response()->json($company);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required|mimes:png|max:2000|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ]);

		Storage::putFile(
            'company',
            $request->logo
        );

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo->getClientOriginalName();
        $company->website = $request->website;
        $company->save();

        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'mimes:png|max:2000|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ]);

        $company = Company::findOrFail($id);

        if ($request->hasFile('logo')) {
        	Storage::delete('company', $company->logo);

        	Storage::putFile(
	            'company',
	            $request->file('logo')
	        );
	        $company->logo = $request->logo->getClientOriginalName();

        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index');
    }
}
