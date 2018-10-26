
@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
    <div class="container">
        <div class="content">
            <div class="title"></div>
        </div>
        <td><button class="title" onclick="location.href='{{ url('preenrollment') }}'">
        Pre-Enrollment</button></td>
    </div>
@endsection
