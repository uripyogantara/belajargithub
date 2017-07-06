<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use Auth;
class FieldController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customer_id=Auth::user()->id;
        $field = Field::where('customer_id',Auth::user()->id)->get();
        return view('field.view')->with('field',$field);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('field.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $oldfilename=
      if ($request->hasFile('image')) {
        $request->file('image');

        //filename of picture
        $customer_name=Auth::user()->name;
        $field_name=$request->name;
        $extension=$request->image->extension();
        $filename=$customer_name."_".$field_name."_".time().".".$extension;
        $filename=str_replace(' ','',$filename);

        //store the picture
        $path="public/field/".Auth::user()->id;
        $request->image->storeAs($path,$filename);

        //insert into database
        $field = new Field;
        $field->name= $request->name;
        $field->picture= $filename;
        $field->customer_id=Auth::user()->id;
        $field->save();
        return redirect('/field');
      }else{
        return "false";
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field= Field::where('id',$id)->first();
        return view('field.form_edit')->with('field',$field);
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
        $field=Field::find($id);
        $field->name=$request->name;
        $field->save();

        return redirect('/field');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field=Field::find($id);
        $field->delete();

        return redirect('/field');
    }
}
