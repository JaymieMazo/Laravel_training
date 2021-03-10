@extends('layouts.app')
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->  


<!-- 
<v-tabs  background-color="deep-purple accent-4" >
        <v-tab href="Company">Company</v-tab>
        <v-tab href="Deparment">Deparment</v-tab>
        <v-tab href="Section" >Section</v-tab>
        <v-tab href="Employees">Employees</v-tab>
</v-tabs> -->


<template>
  <hr> 
<v-app>
   <app-component></app-component>
        <!-- <company-component></company-component> -->
        <!-- <department-component></department-component> -->
        
</v-app>
@endsection
