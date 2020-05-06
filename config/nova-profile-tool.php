<?php

return [
    'fields' => [
        [
            "component" => "text-field",
            "prefixComponent" => true,
            "attribute" => "name",
            "value" => 'name',
            "panel" => null,
            "sortable" => false,
            "textAlign" => "left"
        ],
        [
            "component" => "text-field",
            "prefixComponent" => true,
            "attribute" => "email",
            "value" => 'email',
            "panel" => null,
            "sortable" => false,
            "textAlign" => "left"
        ],
        [
            "component" => "password-field",
            "prefixComponent" => true,
            "attribute" => "password",
            "value" => null,
            "panel" => null,
            "sortable" => false,
            "textAlign" => "left"
        ],
        [
            "component" => "password-field",
            "prefixComponent" => true,
            "attribute" => "password_confirmation",
            "value" => null,
            "panel" => null,
            "sortable" => false,
            "textAlign" => "left"
        ]
    ],
    'validations' => [
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'nullable|string|confirmed'
    ],
];
