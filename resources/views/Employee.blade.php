@extends('app')
@section('title','Employees')
@section('header', 'Employee Page')
@section('content')
<body>
        <form  method="post"  action="employee">
            <select name="company_name" id="company_Sel">
            @foreach($companies as $key => $company)
                <option >{{$company->company_name}}</option>
            @endforeach
            </select>   

            <select name="department_name" id="dept">
            @foreach($departments as $key => $department)
                <option value="{{$department->company_code}}"></option>
            @endforeach
            </select>   



            <input type="text" name="employeename" placeholder="Enter Employee Name">
            <button type="submit">Submit</button>
            @csrf
        </form>

    <hr>

    <table>
            <thead>
                    <tr>
                    <th>No.</th>     
                    <th>Employee Name</th>
                    <th>Gender</th>
                    <th>Contract</th>
                    <th>Company Name</th>
                    <th>Department Name</th>
                    <th>Section Name</th>
                    </tr>   
            </thead>
    <tbody>
        @foreach($employee as $key => $data)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$data->employee_name}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->ContractStatus}}</td>
                    <td>{{$data->company_name}}</td>
                    <td>{{$data->department_name}}</td>
                    <td>{{$data->section_name}}</td>
                </tr>
        @endforeach
    </tbody>
    </table>
<!-- 
 <script>
    var sel=document.getElementById('sel_company').onclick
</script> 
@endsection

<script>
var dept_data={!! json_encode($departments)!!}
window.addEventListener("load" , function(){
    myfunction();

    document.getElementById("dept").addEventListener("change" , function(){
        myfunction();
    })
})

function myFunction(){
    var x=document.getElementById("dept");
    var y=departments_data.filter(rec=>{
            return rec.company_code==document.getElementById("company_Sel").value
    })



var ctr=y.length>0 ? y.length:x.length

    for(var z =0; z<=ctr; z++){
        x.remove(0)
    }


    for(var i=0; i<y.length ;  i++){
        if(y.length > 0 ){
            var option=document.createElement("option");
            option.text=y[i].department_name;
            option.value=y[i].department_code;
            x.add(option);
        }
    }
}
</script> -->