@extends('app')
@section('title','Department')
@section('header' , 'Department Page')
@section('content')
        <form  method="post"  action="department">
        <!-- company name selection -->
            <select name="company_name">
            @foreach($items as $key => $company)
                <option >{{$company->company_name}}</option>
            @endforeach
            </select>     


        <!-- enter department name -->
            <input type="text" name="department_name" placeholder="Enter Department Name">
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
                    </tr>   
            </thead>
    <tbody>
    @foreach($data as $key => $departments)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$departments->company_name}}</td>
                    <td>{{$departments->department_name}}</td>
                </tr>
        @endforeach
    </tbody>
    </table>
    @endsection
