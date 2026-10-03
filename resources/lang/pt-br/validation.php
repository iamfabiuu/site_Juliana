<?php

return [

    'confirmed' => 'Erro: As senhas digitadas precisam ser iguais.',
    'email'     => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'min'       => [
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],
    'required'  => 'O campo :attribute é obrigatório.',

    /*
    |----------------------------------------------------------------------
    | Atributos customizados
    |----------------------------------------------------------------------
    */
    'attributes' => [
        'email'                 => 'e-mail',
        'password'              => 'senha',
        'password_confirmation' => 'confirmação de senha',
    ],

];
