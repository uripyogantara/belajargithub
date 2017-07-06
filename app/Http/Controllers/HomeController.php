<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Field;
use App\Schedule;
use App\Transaction;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('home')->with('customer',$customer);
    }

    public function viewCustomer($id){
        $customer = Customer::where('id',$id)->first();
        $field = Field::where('customer_id',$id)->get();
        return view('viewCustomer')
        ->with('customer',$customer)
        ->with('field',$field);
    }

    public function viewSchedule(Request $request,$field_id){
        $date=$request->date;
        $day= date_format(date_create($date),'N');
        $schedule=Schedule::with(['transaction'=>function($query) use($date){
            $query->where('created_at','like',$date."%");
        }])->where([['field_id',$field_id],['day_id',$day]])->get();
        return view('viewSchedule')->with('schedule',$schedule);
    }

    public function book($schedule_id){
        $user_id=Auth::user()->id;

        $transaction= new Transaction;
        $transaction->user_id=$user_id;
        $transaction->schedule_id=$schedule_id;
        $transaction->status='pending';
        $transaction->save();
    }
}
