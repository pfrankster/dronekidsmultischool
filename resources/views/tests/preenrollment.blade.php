
@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
    <div class="container">
        <?php
        $paymentTypes = DB::table('tmp_payman_types')->get();
        $classes = DB::table('tmp_classes')->get();
        $shools = DB::table('tmp_schools')->get();
        $sections = DB::table('tmp_sections')->get();
        ?>
	    <h2>Form Validation</h2>
        <div class="content">
            <div class="title">Test</div>
            <form method="POST" action="preenrollment" autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br/>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <div id="gGuardian">
                Guardian
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianName') ? 'has-error' : '' }}">
                            <label for="guardianName">Full Name:</label>
                            <input type="text" id="guardianName" name="guardianName" class="form-control" placeholder="Enter Full Name" value="{{ old('firstname') }}">
                            <span class="text-danger">{{ $errors->first('guardianName') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianCPF') ? 'has-error' : '' }}">
                            <label for="guardianCPF">CPF:</label>
                            <input type="text" id="guardianCPF" name="guardianCPF" class="form-control" placeholder="Enter CPF" value="{{ old('guardianCPF') }}">
                            <span class="text-danger">{{ $errors->first('guardianCPF') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianPhone') ? 'has-error' : '' }}">
                            <label for="guardianPhone">Telephone:</label>
                            <input type="text" id="guardianPhone" name="guardianPhone" class="form-control" placeholder="Enter Telephone" value="{{ old('guardianPhone') }}">
                            <span class="text-danger">{{ $errors->first('guardianPhone') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address') }}">
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                            <label for="state">State:</label>
                            <input type="text" id="state" name="state" class="form-control" placeholder="Enter States" value="{{ old('state') }}">
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="Enter City" value="{{ old('city') }}">
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter E-mails" value="{{ old('email') }}"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianRelation') ? 'has-error' : '' }}">
                            <label for="guardianRelation">Relation To Student:</label>
                            <select id="guardianRelation" name="guardianRelation" class="form-control" value="{{ old('guardianRelation') }}">
                                <option disabled selected value> -- Select an Relation -- </option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="sister">Sister</option>
                                <option value="brother">Brother</option>
                                <option value="uncle">Uncle</option>
                                <option value="maternalUncle">Maternal Uncle</option>
                                <option value="otherRelative">Other Relative</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('guardianRelation') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="gStudent">
                Student
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('studentName') ? 'has-error' : '' }}">
                            <label for="studentName">Full Name:</label>
                            <input type="text" id="studentName" name="studentName" class="form-control" placeholder="Enter Full Name" value="{{ old('studentName') }}">
                            <span class="text-danger">{{ $errors->first('studentName') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('studentGender') ? 'has-error' : '' }}">
                            <label for="studentGender">Gender:</label>
                            <select id="studentGender" name="studentGender" class="form-control" value="{{ old('studentGender') }}">
                                <option disabled selected value> -- Select an Gender -- </option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('studentGender') }}</span>
                        </div>
                    </div>
                </div>
            </div> 
            <div id="gClass">
                Class
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('pmSchool') ? 'has-error' : '' }}">
                            <label for="pmSchool">School:</label>
                            <select id="pmSchool" name="pmSchool" class="form-control" value="{{ old('pmSchool') }}">
                            <option disabled selected value> -- Select an School -- </option>
                            <?php 
                                foreach($shools as $shool){
                                    echo "<option value=" . $shool->id . ">" . $shool->name ."</option>";
                                } 
                            ?>
                            </select>
                            <span class="text-danger">{{ $errors->first('pmSchool') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('pmClass') ? 'has-error' : '' }}">
                            <label for="pmClass">Class:</label>
                            <select id="pmClass" name="pmClass" class="form-control" value="{{ old('pmClass') }}">
                            <option disabled selected value> -- Select an Class -- </option>
                            <?php 
                                foreach($classes as $class){
                                    echo "<option value=" . $class->id . ">" . $class->name ."</option>";
                                } 
                            ?>
                            </select>
                            <span class="text-danger">{{ $errors->first('pmClass') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php

                    ?>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('pmSection') ? 'has-error' : '' }}">
                            <label for="pmSection">Section:</label>
                            <select id="pmSection" name="pmSection" class="form-control" value="{{ old('pmSection') }}">
                                <option disabled selected value> -- Select an Section -- </option>
                                <!-- <?php 
                                    foreach($sections as $section){
                                        echo "<option value=" . $section->id . ">" . $section->name ."</option>";
                                    } 
                                ?> -->
                            </select>
                            <span class="text-danger">{{ $errors->first('pmSection') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="gPaymant">
                <div class="row ">
                    <div class="col-md-6 ">
                        <div class="form-group {{ $errors->has('pmPaymantType') ? 'has-error' : '' }}">
                            <label for="pmPaymantType">Paymant Type:</label>
                            <select id="pmPaymantType" name="pmPaymantType" class="form-control" value="{{ old('pmPaymantType') }}">
                            <option disabled selected value> -- Select an Payment Type -- </option>
                            <?php 
                                foreach($paymentTypes as $paymentType){
                                    echo "<option value=" . $paymentType->id . ">" . $paymentType->name ."</option>";
                                } 
                            ?>
                            </select>
                            <span class="text-danger">{{ $errors->first('pmPaymantType') }}</span>
                        </div>
                    </div>
                </div>
                
            </div> 
            <div id="gTerms">
                <input type="checkbox" name="pmTermsAccept" value="acceptContract"> Accept Terms
                <a href="https://www.w3schools.com/" target="_blank">Contract</a><br>                
            </div>  
                <input type="submit">
            </form>
            <br><br><br>
        </div>
    </div>
    <td><button class="content" onclick="location.href='{{ url('') }}'">
     Form</button></td>

     <script>
        $(document).ready(function(){
            $("#pmSchool").change (function(){
                $.post('preenrollment/test', function(){ 
                    console.log('response'); 
                });
                //  $.get("requestSections.asp",function(data, status){
                //     alert("Data: " + data + "\nStatus: " + status);
                //  });
            });
        });
     </script>
@endsection
