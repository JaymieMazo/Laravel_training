@extends('app')
@section('title','Company')
@section('header' , 'Company Page'  )
@section('content'  )

    <form  method="post"  action="company">
    <input type="text" name="company_name" placeholder="Enter Company Name">
    <button type="submit">Submit</button>
     @csrf
    </form>
    <hr>

    <v-simple-table
    fixed-header
    height="300px"
  >
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">
            Company Code 
          </th>
          <th class="text-left">
          Company Name  
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in desserts"
          :key="item.name"
        >
          <td>{{ data.company_code  }}</td>
          <td>{{ data.company_name }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
    @endsection
