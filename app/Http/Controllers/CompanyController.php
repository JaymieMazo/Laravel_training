<?php

namespace App\Http\Controllers;
use App\Company;
use App\Department;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function get_data(){
        $data=Company::from('companies as Com')->select('Com.company_code' , 'Com.company_name' , 'Com.created_at' , 'Com.updated_at' , 'emp.employee_name')
                ->join('employees as emp' ,  'Com.updated_by' , '=','emp.employee_code')
                ->get();
                // return view('company' , compact('data'));
        return $data;
    } 

    public function insert_data(Request  $req){
        $params_name=$req->input('company_name');
         $if_exist=Company::select('company_name')
        ->where('company_name' , strtoupper($params_name))
        ->get();

    if(count($if_exist ) ==0 && $params_name != ''){
            $last_code=Company::select( DB:: raw('company_code + 1  as new_code' ) )
            ->orderby('company_code' , 'desc')
            ->limit(1)
            ->get();

            $new_id=str_pad(count($last_code)  > 0 ?   $last_code[0] ->new_code: '1' , 3 , '0' , STR_PAD_LEFT); 
            Company::Insert(['company_code' =>$new_id, 'company_name' =>strtoupper($params_name), 'created_at'=>date('Y-m-d H:i:s') , 'updated_at' =>date('Y-m-d H:i:s') , 'updated_by' =>'34782']);
    }


    // return Redirect::back();
    return $this->get_data();
    }
}
