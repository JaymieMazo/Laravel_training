<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Department;
use App\Employee;
use App\Section;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function get_data(){

      $companies=Company::select('company_name')
      ->get();
      // return $sections;
  
      // return   $departments;
      $sections=Section::select('section_name')
      ->get();
      $employee=Employee::select('employee_name' , DB::raw('case when gender=1 then "Male" else "Female" end as Gender')  , DB::raw('case when contract_status ="C" then "Contractual" else "Regular" end as ContractStatus' )  ,   'companies.company_name','departments.department_name' ,'sections.section_name' )
      ->join('companies'  , 'employees.company_code'  , 'companies.company_code' )
      ->join('sections' , function($join){
        $join->on( 'employees.company_code' , '=' ,'sections.company_code');
        $join->on('employees.department_code' , '=' , 'sections.department_code');
        $join->on( 'employees.section_code' , '=' , 'sections.section_code');})
      ->join('departments'  ,function($join){$join->on('employees.company_code'  , 'departments.company_code' );$join->on('employees.department_code'  , 'departments.department_code');})->get();

      return view('employee' , compact(  'companies'  , 'sections' , 'employee'));
    }

public function insert_data(Request $req){

return $req;
  $departments=Department::all()->where('company_code' , );

}

}