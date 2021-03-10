<?php

namespace App\Http\Controllers;
use App\Company;
use App\Department;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class DepartmentController extends Controller
{



    public function get_data(){
        $items=Company::select('company_name')
        ->get();
        // viewing of all departments
        $data=Department::from('departments as dep')
        -> select( 'dep.department_code', 'dep.department_name' , 'com.company_name' , 'dep.created_at' , 'dep.updated_at' , 'emp.employee_name') 
        ->join('companies as com' , 'dep.company_code' ,'=',  'com.company_code')
        ->join('employees as emp' , 'emp.employee_code' , 'dep.updated_by')->get();
// return view('department' , compact('data','items' ));
return  ( $data  ) ;
    }

    public function insert_data(Request $req){
        $params_company=$req->input('company_name' );
        $params_department=$req->input(('department_name' ));
        $company_code=Company::select('company_code' )
                        ->where('company_name' , '=' , strtoupper( $params_company))
                        ->pluck('company_code');
        
        $exists=department::select( 'companies.company_name', 'departments.company_code' , 'department_name'  )
                    ->join('companies' ,  'companies.company_code' , '=' , 'departments.company_code')
                    ->where('companies.company_name' , '=' , strtoupper($params_company))
                    ->where('department_name' , '=' , strtoupper($params_department))
                    ->get();
    
        $max=department::select(DB::raw('department_code + 1 as new_depCode'))
        ->join('companies' ,  'companies.company_code' , '=' , 'departments.company_code')
        ->where('companies.company_name' , '=' , strtoupper($params_company))
        ->orderby('department_code' , 'desc')
        ->limit(1)
        ->get();
    

      $new_deptcode=str_pad(count($max)  > 0 ?   $max[0] ->new_depCode: '1' , 3 , '0' , STR_PAD_LEFT); 
    // return $company_code[0];
    
    
    
    if (count($exists)==0  &&  $params_department !=''  ) {
        // return 'add' .  $company_code .  $new_deptcode  .  strtoupper($params_department);
        Department::Insert(['company_code'=>$company_code[0] ,   'department_code'=> $new_deptcode , 'department_name' =>strtoupper($params_department), 'created_at'=>date('Y-m-d H:i:s') , 'updated_at' =>date('Y-m-d H:i:s') , 'updated_by' =>'34782']);
    }
    elseif( $params_department =='' ){
        return 'Input Department Name';
    }
    
    elseif(count($exists==1)){
        return 'Department already Exists';
    }
    // return Redirect::back();
    return $this->get_data();
    }
}
