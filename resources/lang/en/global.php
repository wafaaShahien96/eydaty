<?php
return
    [
        'add_new'            => 'Add New',
        'back'               => 'back',
        'save'               => 'Submit',
        'update'             => 'Update',

        'Users'                => [
            'title'          => 'Users',
            'fields'         => [
                'id'                  => 'ID',
                'name'                => 'Name',
                'phone'               => 'Phone',
                'image'               => 'Image',
                'age'                 => 'Age',
                'gender'              => 'Gender',
                'email'               => 'Email',
                'address'             => 'Address',
                'action'              => 'Action',
                'create_user'         => 'Create User',
                'update_user'         => 'Update User',
                'password'            => 'Password',
            ],
        ],
        'Setting'                =>  [
            'title'            => 'Settings',
            'fields'         => [
                'id'                  => 'ID',
                'name'                => 'Name',
                'phone'               => 'Phone',
                'address'             => 'Address',
                'logo'                => 'Logo',
                'email'               => 'Email',
                'fb_link'             => 'FB Link',
                'tw_link'             => 'Tw Link',
                'action'              => 'Action',
                'update_setting'      => 'Update Setting'

            ],
        ],
        'Price'                  =>  [
            'title'            => 'Pricing',
            'fields'         => [
                'id'                  => 'ID',
                'fees'                => 'Fees',
                'home_fees'           => 'Home Fees',
                'agence_fees'         => 'Agence Fees',
                'follow_up'           => 'Follow Up',
                'action'              => 'Action',
                'update_pricing'      => 'Update Pricing'
            ],
        ],
        'Visit Request'                  =>  [
            'title'            => 'Visit Request',
            'fields'         => [
                'id'                        => 'ID',
                'patient'                   => 'Patient',
                'type'                      => 'Type',
                'date'                      => 'Date',
                'last_visit'                => 'Last Visit',
                'action'                    => 'Action',
                'update_visit_request'      => 'Update Visit Requests',
                'create_visit_request'      => 'Create Visit Requests'
            ],
        ],
        'Visits'                  =>  [
            'title'            => 'Visit',
            'fields'         => [
                'id'                  => 'ID',
                'patient'             => 'Patient',
                'type'                => 'Type',
                'date'                => 'Date',
                'conclusion'          => 'Conclusion',
                'documents'           => 'Documents',
                'action'              => 'Action',
                'update_visit'        => 'Update Visit',
                'create_visit'        => 'Create Visit'
            ],

        ],

        'Home Request'                  =>  [
            'title'            => 'Home Request',
            'fields'         => [
                'id'                                   => 'ID',
                'patient'                              => 'Patient',
                'required_date'                        => 'Required Date',
                'accepted_date'                        => 'Accepted Date	',
                'status'                               => 'Status',
                'action'                               => 'Action',
                'update_home_request'         => 'Update Home Request',
                'create_home_request'         => 'Create Home Request'
            ],

        ],
        'Patient Query'                  =>  [
            'title'            => 'Patient Query',
            'fields'         => [
                'id'                                   => 'ID',
                'patient'                              => 'Patient',
                'question'                             => 'Question',
                'question_date'                        => 'Question Date',
                'response'                             => 'Response',
                'response_date'                        => 'Response Date',
                'action'                               => 'Action',
                'update_patient_query'         => 'Update PatientQuery',
                'create_patient_query'         => 'Create PatientQuery'
            ],

        ],

        'sign out' => 'Sign Out',
        'ok' => 'Ok',
        'cancel' => 'Cancel',
        'Are you sure?' => 'Are You Sure ?',
        'warn deletion' => 'This record and it`s details will be permanantly deleted !',
        'home' => 'Home',
        'doctors' => 'Doctors',
        'users' => 'Users',



    ];
