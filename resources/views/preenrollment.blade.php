
@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
    <div class="container">
        <?php
        use App\Http\Controllers\DataBaseController;
        $paymentTypes = DataBaseController::getPaymentTypes();
        $shools = DataBaseController::getShools();
        $lPrefixPlacehold = "Informe o ";
        $lSelection = "Selecione um opção";
        $lGroupGuardian = "Responsavel";
        $lGuardianName = "Nome Completo";
        $lGuardianCPF = "CPF";
        $lGuardianPhone = "Telephone";
        $lAdress = "Endereço";
        $lState = "Estado";
        $lCity = "Cidade";
        $lEmail = "E-mail";
        $lRelation = "Relacionamento com Estudante";
        $lGroupStudent = "Estudante";
        $lStudentName = "Nome Completo";
        $lStudentGender = "Genero";
        $lGroupClass = "Escola";
        $lSchool = "Escola";
        $lClass = "Curso";
        $lSection = "Turma";
        $lPaymentType = "Tipo de Pagamento";
        $lAcceptTerms = "Aceito os termos do";
        $lContract = "Contrato";
        $lSumbit  = "Enviar";
        ?>
        <div class="content">
            <div class="title">Matricula</div>
            <form method="POST" action="peValidate" autocomplete="ON">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if($errors->any())
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
            <label for="gGuardian"><?php echo $lGroupGuardian ?></label>
            <div id="gGuardian">
                
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianName') ? 'has-error' : '' }}">
                            <label for="guardianName"><?php echo $lGuardianName ?></label>
                            <input type="text" id="guardianName" name="guardianName" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lGuardianName."'" ?> value="{{ old('firstname') }}">
                            <span class="text-danger">{{ $errors->first('guardianName') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianCPF') ? 'has-error' : '' }}">
                            <label for="guardianCPF"><?php echo $lGuardianCPF ?></label>
                            <input type="text" id="guardianCPF" name="guardianCPF" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lGuardianCPF."'" ?> value="{{ old('guardianCPF') }}">
                            <span class="text-danger">{{ $errors->first('guardianCPF') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianPhone') ? 'has-error' : '' }}">
                            <label for="guardianPhone"><?php echo $lGuardianPhone ?></label>
                            <input type="tel" id="guardianPhone" name="guardianPhone" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lGuardianPhone."'" ?> value="{{ old('guardianPhone') }}">
                            <!-- <input id="guardianPhone" type="tel" name="guardianPhone" placeholder="(XX) XXX-XXXX" pattern="\(\d{3}\) \d{3}\-\d{4}" class="masked form-control" value="{{ old('guardianPhone') }}"> -->
                            <span class="text-danger">{{ $errors->first('guardianPhone') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address"><?php echo $lAdress ?></label>
                            <input type="text" id="address" name="address" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lAdress."'" ?> value="{{ old('address') }}">
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                            <label for="state"><?php echo $lState ?></label>
                            <input type="text" id="state" name="state" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lState."'" ?> value="{{ old('state') }}">
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label for="city"><?php echo $lCity ?></label>
                            <input type="text" id="city" name="city" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lCity."'" ?> value="{{ old('city') }}">
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email"><?php echo $lEmail ?></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lEmail."'" ?> value="{{ old('email') }}"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('guardianRelation') ? 'has-error' : '' }}">
                            <label for="guardianRelation"><?php echo $lRelation ?></label>
                            <select id="guardianRelation" name="guardianRelation" class="form-control" value="{{ old('guardianRelation') }}">
                                <option disabled selected value> -- <?php echo $lSelection ?> -- </option>
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
            <label for="gStudent"><?php echo $lGroupStudent ?></label>
            <div id="gStudent">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('studentName') ? 'has-error' : '' }}">
                            <label for="studentName"><?php echo $lStudentName ?></label>
                            <input type="text" id="studentName" name="studentName" class="form-control" placeholder=<?php echo "'".$lPrefixPlacehold.$lStudentName."'" ?> value="{{ old('studentName') }}">
                            <span class="text-danger">{{ $errors->first('studentName') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('studentGender') ? 'has-error' : '' }}">
                            <label for="studentGender"><?php echo $lStudentGender ?></label>
                            <select id="studentGender" name="studentGender" class="form-control" value="{{ old('studentGender') }}">
                                <option disabled selected value> -- <?php echo $lSelection ?> -- </option>
                                <option value="male">Homem</option>
                                <option value="female">Mulher</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('studentGender') }}</span>
                        </div>
                    </div>
                </div>
            </div> 
            <label for="gClass"><?php echo $lGroupClass ?></label>
            <div id="gClass">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('peSchool') ? 'has-error' : '' }}">
                            <label for="peSchool"><?php echo $lSchool ?></label>
                            <select id="peSchool" name="peSchool" class="form-control" value="{{ old('peSchool') }}">
                            <option disabled selected value> -- <?php echo $lSelection ?> -- </option>
                            <?php 
                                foreach($shools as $shool){
                                    echo "<option value=" . $shool->id . ">" . $shool->school_name ."</option>";
                                } 
                            ?>
                            </select>
                            <span class="text-danger">{{ $errors->first('peSchool') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('peClass') ? 'has-error' : '' }}">
                            <label for="peClass"><?php echo $lClass ?></label>
                            <select id="peClass" name="peClass" class="form-control" value="{{ old('peClass') }}">
                            <option disabled selected value> -- <?php echo $lSelection ?> -- </option>
                            </select>
                            <span class="text-danger">{{ $errors->first('peClass') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php

                    ?>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('peSection') ? 'has-error' : '' }}">
                            <label for="peSection"><?php echo $lSection ?></label>
                            <select id="peSection" name="peSection" class="form-control" value="{{ old('peSection') }}">
                                <option disabled selected value> -- <?php echo $lSelection ?> -- </option>
                                
                            </select>
                            <span class="text-danger">{{ $errors->first('peSection') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <label for="gPaymant">
                <?php 
                // echo $lGroupPaymant
                ?>
            </label> -->
            <div id="gPaymant">
                <div class="row ">
                    <div class="col-md-6 ">
                        <div class="form-group {{ $errors->has('pePaymantType') ? 'has-error' : '' }}">
                            <label for="pePaymantType"><?php echo $lPaymentType ?></label>
                            <select id="pePaymantType" name="pePaymantType" class="form-control" value="{{ old('pePaymantType') }}">
                            <option disabled selected value> -- <?php echo $lSelection ?> -- </option>
                            <?php 
                                foreach($paymentTypes as $paymentType){
                                    echo "<option value=" . $paymentType->id . ">" . $paymentType->name ."</option>";
                                } 
                            ?>
                            </select>
                            <span class="text-danger">{{ $errors->first('pePaymantType') }}</span>
                        </div>
                    </div>
                </div>
                
            </div> 
            <div id="gTerms">
                <input id="peTermsAccept" type="checkbox" name="peTermsAccept" value="acceptContract"> <?php echo $lAcceptTerms ?>
                <a href="https://www.w3schools.com/" target="_blank"><?php echo $lContract ?></a><br>                
            </div>  
                <input id="btnSubmit" type="submit" value =<?php echo $lSumbit ?>>
            </form>
            <br><br><br>
        </div>
    </div>
    <td><button class="content" onclick="location.href='{{ url('') }}'">
     Form</button></td>
    
     <script  type="text/javascript" src="{{ URL::asset('../resources/js/dbpreenrollment.js') }}"></script>

    
    <!-- <script src="../resources/js/inputmask.js"></script> -->
     <script type="text/javascript">
     
    //  function teste(){
    //             console.log("teste:" + document.getElementById("peTermsAccept").checked);
    //             console.log("Disabled:" + $(":submit").is(":disabled");
    //         }
        $(document).ready(function(){
            $("#peTermsAccept").change(function() {
                if(this.checked) {
                    // console.log("1");
                    $("#btnSubmit").disabled = false;
                 } else {
                    // console.log("2");
                    // $("#btnSubmit").disabled = true;
                    document.getElementById("submit").disabled=true;
                }
            });
           
            
        });
     </script>
@endsection
