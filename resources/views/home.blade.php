
@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
    <div class="container">
        <div class="content">
            <div class="title">teste 5</div>
        </div>
        <td><button onclick="location.href='{{ url('preenrollment') }}'">
        preenrollment</button></td>
        <td><button onclick="location.href='{{ url('preenrollmentTeste') }}'">
        tmp preenrollment Test</button></td>
    </div>
@endsection
