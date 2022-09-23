<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|max:10', //required+maximum 10 char
            'email'=>'required|email',
        ];

        $custom_msg=[
            'name.required'=>'Enter Your Name',
            'name.max'=>'Name can not contain more then 10 char',
            'email.required'=>'Enter Your Email',
            'email.email'=>'Email must be a valid email',
        ];

        $this->validate($request,$rules,$custom_msg);

        $crd=new Crud();
        $crd->name=$request->name;
        $crd->email=$request->email;
        $crd->save(); 

        Session::flash('msg','Data Successfully Added');
        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$showData = Crud::all();
        // $showData = Crud::paginate(5);
        $showData = Crud::simplePaginate(5);
        return view('show_data',compact('showData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $editData=Crud::find($id); 
        return view('edit_data',compact('editData'));
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
        $rules=[
            'name'=>'required|max:10', //required+maximum 10 char
            'email'=>'required|email',
        ];

        $custom_msg=[
            'name.required'=>'Enter Your Name',
            'name.max'=>'Name can not contain more then 10 char',
            'email.required'=>'Enter Your Email',
            'email.email'=>'Email must be a valid email',
        ];

        $this->validate($request,$rules,$custom_msg);

        $crd=Crud::find($id);
        $crd->name=$request->name;
        $crd->email=$request->email;
        $crd->save(); 

        Session::flash('msg','Data Successfully Updated');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData=Crud::find($id);
        $deleteData->delete();
        Session::flash('msg','Data Successfully Deleted');
        return redirect('/');
    }
}
