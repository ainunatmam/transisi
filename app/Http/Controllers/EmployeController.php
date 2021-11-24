<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

use PDF;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employe = Employe::with('company')->orderBy('created_at', 'desc')->paginate(5);

        return view('employes.index', ['employe' => $employe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employes.create');
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
            'company_id' => 'required|numeric',
            'email' => 'required|email'
        ]);

        $employe = new Employe($request->all());
        $employe->save();

        return redirect()->route('employes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::findOrFail($id);

        return view('employes.show', ['employe' => $employe]);
    }

    public function cetak_pdf()
    {
        $employe = Employe::with('company')->orderBy('created_at', 'desc')->paginate(5);

        $pdf = PDF::loadview('employes.cetak_pdf',['employe'=>$employe]);

        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employe::findOrFail($id);

        return view('employes.edit', ['employe' => $employe]);
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
        $employe = Employe::findOrFail($id);
        $employe->update($request->all());

        return route('employes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return redirect()->route('employes.index');
    }
}
