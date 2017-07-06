<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Field;
use Auth;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
        $field = Field::where('customer_id',Auth::user()->id)->get();
        return view('schedule.index')->with('field',$field);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($field_id){
        return view('schedule.form2')->with('field_id',$field_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelajar=$request->harga_pelajar;
        $umum=$request->harga_umum;
        $start=$request->start;
        $finish=$request->finish;
        print_r($start);
        print_r($finish);
        for ($day=1; $day <=7 ; $day++) { 
            foreach ($start as $key => $value) {
                for ($i=$value; $i <$finish[$key] ; $i++) { 
                    $schedule= new Schedule;
                    $schedule->field_id=4;
                    $schedule->day_id=$day;
                    $schedule->start_at=$i.":00";
                    $schedule->save();
                }
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
