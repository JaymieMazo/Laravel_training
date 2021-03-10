<?php

namespace App\Http\Controllers;
use App\Company;
use App\Department;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class SectionController extends Controller
{
    public function get_data(){
        $company=Company::select('company_name')
        ->get();

        // departmentname selection
      $dept=Department::select('department_name')
        ->get();
    
        //  sections viewing
        $sections=Section::select( 'section_name', 'departments.department_name' , 'company_name') 
        ->join('companies' , 'sections.company_code' ,'=',  'companies.company_code')
        ->join('departments' ,function($join){
            $join->on('sections.company_code' , '='  , 'departments.company_code');
            $join->on('sections.department_code' , '='  , 'departments.department_code');
        })
        ->get();
    
        return view('section' , compact('company' , 'dept', 'sections' ));

    }


    public function insert_data(Request $req){
        $params_company=$req->input('company_name' );
        $params_department=$req->input(('department_name' ));
        $params_section=$req->input(('section_name' ));
    
        // getting company_code based on company_name inputted
        $company_code=Company::select('company_code' )
                        ->where('company_name' , '=' , strtoupper( $params_company))
                        ->pluck('company_code');
      // getting department_code based on department_name inputted
        $department_code=Department::select('department_code' , 'company_code' )
                    ->where('company_code' , '=' , $company_code[0])
                    ->where('department_name' , '=' , strtoupper($params_department))
                    ->pluck('department_code');
    
    
                
        $exists=section::select('sections.company_code' , 'sections.department_code' , 'section_name'  )
                    ->join('departments' ,function($join){
                            $join->on('sections.company_code' , '='  , 'departments.company_code');
                            $join->on('sections.department_code' , '='  , 'departments.department_code');
        })
                    ->where('sections.company_code' , '=' , $company_code)
                    ->where('sections.department_code' , '=' , $department_code)
                    ->where('section_name' , '=' , $params_section)
                    ->get();
    
    
                    // return  $company_code[0] .  $department_code [0].  $params_department .  $params_section   . count($exists); 
    
        $maxSec=section::select(DB::raw('section_code + 1 as new_SecCode'))
                ->join('departments' ,function($join){
                        $join->on('sections.company_code' , '='  , 'departments.company_code');
                        $join->on('sections.department_code' , '='  , 'departments.department_code');
        })
        ->where('sections.company_code' , '=' , $company_code[0])
        ->where('sections.department_code' , '=' , $department_code[0])
        ->orderby('section_code' , 'desc')
        ->limit(1)
        ->get();
    
        // return 
    
      $new_sectioncode=str_pad(count($maxSec)  > 0 ?   $maxSec[0] ->new_SecCode: '1' , 3 , '0' , STR_PAD_LEFT); 
    
    // return 'code:' .$maxSec .  $new_sectioncode;     
    
    if (count($exists)==0 &&  $params_section !='' ) {
        // return 'add' .  $company_code .  $new_deptcode  .  strtoupper($params_department);
        Section::Insert(['company_code'=>$company_code[0] ,   'department_code'=> $department_code[0]  , 'section_code'=>   $new_sectioncode , 'section_name' =>strtoupper($params_section), 'created_at'=>date('Y-m-d H:i:s') , 'updated_at' =>date('Y-m-d H:i:s') , 'updated_by' =>'34782']);
    }
    elseif( $params_section ==''){
     return   'pls input section name';
    }
    elseif(count($exists)==1){
        return 'Section already Exists';
    }
    return Redirect::back();
    }
}
