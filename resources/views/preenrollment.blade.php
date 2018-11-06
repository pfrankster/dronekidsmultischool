
@extends('layouts.master')

@section('title')
@lang('interface.title')
@endsection

@section('content')
<?php
        use App\Http\Controllers\DBController;
        $paymentTypes = DBController::get_payment_types();
        $shools = DBController::get_shools();
?>
<div class= "container shadow p-3">
<!-- <label for="teste">teste</label> -->
    <!-- ============================================== -->
    <!-- Pre Enrollment Form -->
    <!-- ============================================== -->
    <div class="title">@lang('interface.title')</div>    
    <form method="POST" action="index.php/pvalidation" autocomplete="ON">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($errors->any())
            <div class="alert alert-danger">
            @lang('interface.error_form')
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="gGuardian" class= "form-group  bg-info rounded  p-2" >
            <div class= "input-group justify-content-center" >
                <label for="gGuardian" class="">@lang('interface.guardian')</label>
            </div>
            <div class="row">
                <!-- ======= Guardian Name ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend " >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.guardian_name')</span>
                    </div>
                    <input type="text" id="guardian_name" name="guardian_name" class="form-control {{ $errors->has('guardian_name') ? 'is-invalid' : '' }}" placeholder="@lang('interface.guardian_name')" value="{{ old('guardian_name') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('guardian_name') }}</span>
                </div>
                <!-- ======= CPF ======= -->
                <div class= "col-md-6 input-group my-2" >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.cpf')</span>
                    </div>
                    <input type="text" id="cpf" name="cpf" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" placeholder="@lang('interface.cpf')" value="{{ old('cpf') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('cpf') }}</span>
                </div>
            </div>
            <div class="row">
                <!-- ======= E-mail ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.email')</span>
                    </div>
                    <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="@lang('interface.email')" value="{{ old('email') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('email') }}</span>
                </div>
                <!-- ======= Phone ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.phone')</span>
                    </div>
                    <input type="tel" id="phone" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="@lang('interface.phone')"value="{{ old('phone') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('phone') }}</span>
                </div>
            </div>
            <div class="row">
                <!-- ======= Address ======= -->
                <div class= "col-md-6  input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.address')</span>
                    </div>
                    <input type="text" id="address" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="@lang('interface.address')" value="{{ old('address') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('address') }}</span>
                </div>
                <!-- ======= State ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.state')</span>
                    </div>
                    <input type="text" id="state" name="state" class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="@lang('interface.state')" value="{{ old('state') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('state') }}</span>
                </div>
            </div>
            <div class="row">
                <!-- ======= City ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.city')</span>
                    </div>
                    <input type="text" id="city" name="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="@lang('interface.city')" value="{{ old('city') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('city') }}</span>
                </div>
                
                <!-- ======= Relation ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.relation')</span>
                    </div>
                    <select id="relation" name="relation" class="form-control {{ $errors->has('relation') ? 'is-invalid' : '' }}" value="{{ old('relation') }}">
                        <option disabled selected value> -- <!--@lang('interface.relation')-->@lang('interface.select_option') -- </option>
                        <option value="father">@lang('interface.father')</option>
                        <option value="mother">@lang('interface.mother')</option>
                        <option value="sister">@lang('interface.sister')</option>
                        <option value="brother">@lang('interface.brother')</option>
                        <option value="uncle">@lang('interface.uncle')</option>
                        <option value="maternal_uncle">@lang('interface.maternal_uncle')</option>
                        <option value="other_relative">@lang('interface.other_relative')</option>
                    </select> 
                    <span class="col-md-12 text-danger">{{ $errors->first('relation') }}</span>
                </div> 
            </div>
        </div> 
        <div id="gStudent" class= "form-group  bg-info rounded  p-2" >
            <div class= "input-group justify-content-center" >
                <label for="gStudent" class="">@lang('interface.student')</label>
            </div>
            <div class="row">
                <!-- ======= Student Name ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.student_name')</span>
                    </div>
                    <input type="text" id="student_name" name="student_name" class="form-control {{ $errors->has('student_name') ? 'is-invalid' : '' }}" placeholder="@lang('interface.student_name')" value="{{ old('student_name') }}">
                    <span class="col-md-12 text-danger">{{ $errors->first('student_name') }}</span>
                </div>
                <!-- ======= Student gender ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.gender')</span>
                    </div>
                    <select id="gender" name="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" value="{{ old('gender') }}">
                        <option gender selected value> -- @lang('interface.select_option') -- </option>
                        <option value="male">@lang('interface.male')</option>
                        <option value="female">@lang('interface.female')</option>
                    </select> 
                    <span class="col-md-12 text-danger">{{ $errors->first('gender') }}</span>
                </div> 
            </div>
        </div> 
        <div id="gClass" class= "form-group  bg-info rounded  p-2" >
            <div class= "input-group justify-content-center" >
                <label for="gClass" class="">@lang('interface.class')</label>
            </div>
            <div class="row">
                <!-- ======= School ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text "style="min-width:100px">@lang('interface.school')</span>
                    </div>
                    <select id="school" name="school" class="form-control {{ $errors->has('school') ? 'is-invalid' : '' }}" value="{{ old('school') }}">
                        <option gender selected value> -- @lang('interface.select_option') -- </option>
                        <?php 
                            foreach($shools as $shool){
                                echo "<option value=" . $shool->id . ">" . $shool->school_name ."</option>";
                            } 
                        ?>
                    </select> 
                    <span class="col-md-12 text-danger">{{ $errors->first('school') }}</span>
                </div> 
                <!-- ======= Class ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.class')</span>
                    </div>
                    <select id="class" name="class" class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}" value="{{ old('class') }}">
                        <option gender selected value> -- @lang('interface.select_option') -- </option>
                    </select> 
                    <span class="col-md-12 text-danger">{{ $errors->first('class') }}</span>
                </div> 
            </div> 
            <div class="row">
                <!-- ======= Section ======= -->
                <div class= "col-md-6 input-group my-2 " >
                    <div class= "input-group-prepend" >
                        <span class="input-group-text"style="min-width:100px">@lang('interface.section')</span>
                    </div>
                    <select id="section" name="section" class="form-control {{ $errors->has('section') ? 'is-invalid' : '' }}" value="{{ old('section') }}">
                        <option gender selected value> -- @lang('interface.select_option') -- </option>
                    </select> 
                    <span class="col-md-12 text-danger">{{ $errors->first('section') }}</span>
                </div> 
            </div> 
        </div> 
        <div class= "form-group  bg-info rounded  p-2 " >
            <!-- ======= Payment Type ======= -->
            <div class= "col-md-6 input-group my-2" >
                <div class= "input-group-prepend" >
                    <span class="input-group-text"style="min-width:100px">@lang('interface.payment_type')</span>
                </div>
                <select id="payment_type" name="payment_type" class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" value="{{ old('payment_type') }}">
                    <option gender selected value> -- @lang('interface.select_option') -- </option>
                    <?php 
                        foreach($paymentTypes as $paymentType){
                            echo "<option value=" . $paymentType->id . ">" . $paymentType->name ."</option>";
                        } 
                    ?>
                </select> 
                <span class="col-md-12 text-danger">{{ $errors->first('payment_type') }}</span>
            </div> 
        </div> 
        <!-- ======= Terms ======= -->
        <div class="input-group justify-content-center">
            <div class="form-check">
                <label class="form-check-label">
                    <input id="terms" name="terms" type="checkbox" class="form-check-input">@lang('interface.accept_terms') <a href="http://www.dronekids.com.br/formulario/contrato_servico_dks.pdf" target="_blank">@lang('interface.terms')</a>
                </label>
            </div>
                    <span class="col-md-12 text-danger">{{ $errors->first('terms') }}</span>
        </div>
        <div class="input-group justify-content-end">
            <input id="submit" type="submit" class="btn btn-primary" value =@lang('interface.submit')>
        </div>
    </form>
</div>


                
                                
                                
                                    
    
    
@endsection

@section('scripts')
<script  type="text/javascript" src='public/js/dataloader.js'></script>
<script  type="text/javascript" src='public/js/datamask.js'></script>
@endsection