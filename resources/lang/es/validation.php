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
    'accepted'              => 'El campo debe ser aceptado.',
    'active_url'            => 'El campo no es una URL válida.',
    'after'                 => 'El campo debe ser una fecha después de :date.',
    'alpha'                 => 'El campo sólo puede contener letras.',
    'alpha_dash'            => 'El campo sólo puede contener letras, números y guiones.',
    'alpha_num'             => 'El campo sólo puede contener letras y números.',
    'array'                 => 'El campo debe ser un arreglo.',
    'before'                => 'El campo debe ser una fecha antes :date.',
    'between'               => [
        'numeric' => 'El campo debe estar entre :min - :max.',
        'file'    => 'El campo debe estar entre :min - :max kilobytes.',
        'string'  => 'El campo debe estar entre :min - :max caracteres.',
        'array'   => 'El campo debe tener entre :min y :max elementos.',
    ],
    'boolean'               => 'El campo debe ser verdadero o falso.',
    'confirmed'             => 'El campo de confirmación de no coincide.',
    'date'                  => 'El campo no es una fecha válida.',
    'date_format'           => 'El campo no corresponde con el formato :format.',
    'different'             => 'Los campos y :other deben ser diferentes.',
    'digits'                => 'El campo debe ser de :digits dígitos.',
    'digits_between'        => 'El campo debe tener entre :min y :max dígitos.',
    'dimensions'            => 'El campo no tiene una dimensión válida.',
    'distinct'              => 'El campo tiene un valor duplicado.',
    'email'                 => 'El formato del es inválido.',
    'exists'                => 'El campo seleccionado es inválido.',
    'file'                  => 'El campo debe ser un archivo.',
    'filled'                => 'El campo es requerido.',
    'image'                 => 'El campo debe ser una imagen.',
    'in'                    => 'El campo seleccionado es inválido.',
    'in_array'              => 'El campo no existe en :other.',
    'integer'               => 'El campo debe ser un entero.',
    'ip'                    => 'El campo debe ser una dirección IP válida.',
    'json'                  => 'El campo debe ser una cadena JSON válida.',
    'max'                   => [
        'numeric' => 'El campo debe ser menor que :max.',
        'file'    => 'El campo debe ser menor que :max kilobytes.',
        'string'  => 'El campo debe ser menor que :max caracteres.',
        'array'   => 'El campo puede tener hasta :max elementos.',
    ],
    'mimes'                 => 'El campo debe ser un archivo de tipo: :values.',
    'mimetypes'             => 'El campo debe ser un archivo de tipo: :values.',
    'min'                   => [
        'numeric' => 'El campo debe tener al menos :min.',
        'file'    => 'El campo debe tener al menos :min kilobytes.',
        'string'  => 'El campo debe tener al menos :min caracteres.',
        'array'   => 'El campo debe tener al menos :min elementos.',
    ],
    'not_in'                => 'El campo seleccionado es invalido.',
    'numeric'               => 'El campo debe ser un número.',
    'present'               => 'El campo debe estar presente.',
    'regex'                 => 'El formato del campo es inválido.',
    'required'              => 'El campo es requerido.',
    'required_if'           => 'El campo es requerido cuando el campo :other es :value.',
    'required_unless'       => 'El campo es requerido a menos que :other esté presente en :values.',
    'required_with'         => 'El campo es requerido cuando :values está presente.',
    'required_with_all'     => 'El campo es requerido cuando :values está presente.',
    'required_without'      => 'El campo es requerido cuando :values no está presente.',
    'required_without_all'  => 'El campo es requerido cuando ningún :values está presente.',
    'same'                  => 'El campo y :other debe coincidir.',
    'size'                  => [
        'numeric' => 'El campo debe ser :size.',
        'file'    => 'El campo debe tener :size kilobytes.',
        'string'  => 'El campo debe tener :size caracteres.',
        'array'   => 'El campo debe contener :size elementos.',
    ],
    'string'                => 'El campo debe ser una cadena.',
    'timezone'              => 'El campo debe ser una zona válida.',
    'unique'                => 'El campo ya ha sido tomado.',
    'url'                   => 'El formato de es inválido.',
    'uploaded'              => 'El campo no ha podido ser cargado.',
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
            'rule-name'  => 'custom-message',
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
        'username' => 'usuario',
        'password' => 'contraseña'
    ],
];