@extends('app')
@section('title','Section')
@section('header', 'Section Page')
@section('content')
<body>
        <form  method="post"  action="section">
        <!-- company name selection -->
            <select name="company_name" id="sel_company">
            @foreach($company as $key => $companyname)
                <option >{{$companyname->company_name}}</option>
            @endforeach
            </select>     

        <!-- seclect department -->
            <select name="department_name" id="sel">
            </select>

        <!-- enter section name -->
            <input type="text" name="section_name" placeholder="Enter Section Name">
            <button type="submit">Submit</button>
            @csrf
        </form>
    <hr>
    <table>
            <thead>
                    <tr>
                    <th>No.</th>     
                    <th>Company Name</th>
                    <th>Department Name</th>
                    <th>Section Name</th>
                    </tr>   
            </thead>
    <tbody>
        @foreach($sections as $key => $section)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$section->company_name}}</td>
                    <td>{{$section->department_name}}</td>
                    <td>{{$section->section_name}}</td>
                </tr>
        @endforeach
    </tbody>
    </table>
    
 <script>
    var sel=document.getElementById('sel_company').onclick
</script> 
@endsection
