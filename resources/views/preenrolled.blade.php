
@extends('layouts.master')

@section('title')
@lang('interface.title')
@endsection
@section('content')
<div class= "container shadow p-3">
    <div class="title">@lang('interface.title')</div> 
    <div>
        <label class= "bg-light rounded p-2"> 
            <p>@lang('interface.form_send')</p>
            <p>@lang('interface.form_send2')</p>
        </label> 
    </div>
    <a class='btn btn-info' href={{$pay_link}}>@lang('interface.back_home') </a>
    
</div>
@endsection