
@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Form</div>
            <form action="welcome.php" method="post">
                Guardian:<br>
                Name: <input type="text" name="guardianName"><br>
                CPF: <input type="text" name="guardianCPF"><br>
                Phone: <input type="tel" name="guardianPhone"><br>
                Address: <input type="text" name="address"><br>
                State: <input type="text" name="state"><br>
                City: <input type="text" name="city"><br>
                E-mail: <input type="email" name="email"><br>
                Relation To Student: <input type="text" name="guardianRelation"><br>
                Student:<br>
                Name: <input type="text" name="studentName"><br>
                Gender: 
                <select name="studentGender">
                    <option value="none"></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select> <br>
                Class: <br>
                School: <input type="text" name="school"><br>
                Class: <input type="text" name="class"><br>
                Section: <input type="text" name="section"><br>
                Pay Type: <input type="text" name="paymentType"><br>
                Error <br>
                <input type="checkbox" name="paymentType" value="acceptContract"> Accept Terms
                <a href="https://www.w3schools.com/" target="_blank">Contract</a><br>                
                <input type="submit">
            </form>
        </div>
    </div>
    <td><button class="content" onclick="location.href='{{ url('') }}'">
     Form</button></td>
@endsection
