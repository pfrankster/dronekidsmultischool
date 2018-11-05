<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute precisa ser aceito.',
    'alpha'                => 'O :attribute só pode conter letras.',
    'alpha_num'            => 'O :attribute só pode ocnter letras e numeros.',
    //Tradusir se precisar
    // 'between'              => [
    //     'numeric' => 'The :attribute must be between :min and :max.',
    //     'file'    => 'The :attribute must be between :min and :max kilobytes.',
    //     'string'  => 'The :attribute must be between :min and :max characters.',
    //     'array'   => 'The :attribute must have between :min and :max items.',
    // ],
    // 'boolean'              => 'The :attribute field must be true or false.',
    // 'confirmed'            => 'The :attribute confirmation does not match.',
    // 'date_format'          => 'The :attribute does not match the format :format.',
    // 'digits'               => 'The :attribute must be :digits digits.',
    // 'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'O :attribute precisa ser um endereço email valido.',
    // 'exists'               => 'The selected :attribute is invalid.',
    // 'filled'               => 'The :attribute field must have a value.',
    
    
    // 'in'                   => 'The selected :attribute is invalid.',
    // 'in_array'             => 'The :attribute field does not exist in :other.',
    
    'not_regex'            => 'O formato do :attribute é invalido.',
    'numeric'              => 'O :attribute precisa ser um numero.',
    'regex'                => 'O formato do :attribute é invalido.',
    'required'             => 'O campo :attribute é obrigatorio.',
    
    // 'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    // 'string'               => 'The :attribute must be a string.',
    // 'uploaded'             => 'The :attribute failed to upload.',
    // 'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'guardian_name' => 'Nome do Responsavel',
        'cpf' => 'CPF',
        'phone' => 'Telephone',
        'address' => 'Endereço',
        'state' => 'Estado',
        'city' => 'Cidade',
        'email' => 'E-mail',
        'relation' => 'Parentesco',
        'student_name' => 'Nome do Estudante',
        'gender' => 'Genero',
        'school' => 'Escola',
        'class' => 'Curso',
        'section' => 'Turma',
        'payment_type' => 'Tipo de pagamento',
        'terms' => 'Contrato',
    ],

];
