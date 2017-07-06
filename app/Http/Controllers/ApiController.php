<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Customer;
use App\Mahasiswa;
class ApiController extends Controller{

    public function index(){
    	$customer= Customer::all();
    	return response()->json($customer);
    }

    public function field($customer){
        $field= Field::where('customer_id',$customer)->get();
        return response()->json($field);
    }

    public function insert(Request $request){
    	$data= $request->all();

    	$nama=$data['nama'];
    	$alamat=$data['alamat'];
    	$telepon=$data['telepon'];

    	$mahasiswa= new Mahasiswa;
    	$mahasiswa->nama=$nama;
    	$mahasiswa->alamat=$alamat;
    	$mahasiswa->telepon=$telepon;
    	$mahasiswa->save();

    	return response()->json([
		    'success' => 'Data Berhasil Diinput'
		]);
    }
}
