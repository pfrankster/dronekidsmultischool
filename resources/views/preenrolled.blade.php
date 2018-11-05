
@extends('layouts.master')

@section('title')
@lang('interface.title')
@endsection
@section('content')
<div class= "container shadow p-3">
    <div class="title">@lang('interface.title')</div> 
    <div>
        <label class= "bg-light rounded p-2"> @lang('interface.form_send')</label>  
    </div>
    <a class='btn btn-info' href="http://www.dronekids.com.br">@lang('interface.back_home') </a>
    
</div>
@endsection