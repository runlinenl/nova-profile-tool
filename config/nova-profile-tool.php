<?php

return [
    'fields' => [
        [
            'acceptedTypes'   => "image/*",
            'attribute'       => "avatar",
            'component'       => "file-field",
            'deletable'       => false,
            'downloadable'    => false,
            'helpText'        => null,
            'indexName'       => "Avatar",
            'maxWidth'        => 500,
            'name'            => "Avatar",
            'nullable'        => false,
            'prefixComponent' => true,
            'previewUrl'      => "avatar_url",
            'readonly'        => false,
            'required'        => false,
            'rounded'         => false,
            'sortable'        => false,
            'sortableUriKey'  => "avatar",
            'stacked'         => false,
            'textAlign'       => "center",
            'validationKey'   => "avatar",
            'value'           => "avatar",
        ],
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
