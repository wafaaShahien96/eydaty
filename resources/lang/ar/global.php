<?php
return
    [
        'add_new'            => 'اضافه ',
        'back'               => 'رجوع',
        'save'               => 'ارسال',
        'update'             => 'تحديث',

        'Users'   => [
            'title'          => 'المستخدمين',
            'fields'         => [
                'id'                  => 'ID',
                'name'                => 'اسم',
                'phone'               => 'رقم الهاتف',
                'image'               => 'صوره',
                'age'                 => 'العمر',
                'gender'              => 'الجنس',
                'email'               => 'الحساب',
                'address'             => 'العنوان',
                'action'              => 'الاجراءات',
                'create_user'         => 'اضافه مستحدم ',
                'update_user'         => 'تعديل مستخدم',
                'password'            => 'كلمه المرور',

            ]
        ],


        'Setting'                =>  [
            'title'            => 'الاعدادات',
            'fields'         => [
                'id'                  => 'ID',
                'name'                => 'الاسم',
                'phone'               => 'رقم الموبايل',
                'address'             => 'العنوان',
                'logo'                => 'لوجو',
                'email'               => 'الحساب',
                'fb_link'             => 'رابط الفيسبوك',
                'tw_link'             => 'رابط توتير ',
                'action'              => 'اكشن',
                'update_setting'      => 'تعديل الاعدادت'
            ],
        ],


        'Price'                  =>  [
            'title'            => 'السعر ',
            'fields'         => [
                'id'                  => 'ID',
                'fees'                => 'الرسوم',
                'home_fees'           => 'رسوم الكشف المنزلي',
                'agence_fees'         => 'رسوم الكشف المستعجل',
                'follow_up'           => 'متابعه',
                'action'              => 'اكشن',
                'update_pricing'      => 'تعديل السعر'
            ],
        ],
        'Visit Request'                  =>  [
            'title'            => 'طلبات الزياره ',
            'fields'         => [
                'id'                  => 'ID',
                'patient'             => 'المريض',
                'type'                => 'نوع الزياره ',
                'date'                => 'تاريخ الزياره',
                'last_visit'           => 'اخر زياره',
                'action'              => 'اكشن',
                'update_visit_request'      => 'تعديل طلبات الزياره',
                'create_visit_request'      => 'اضافه طلبات زياره'
            ],
        ],
        'Visits'                  =>  [
            'title'            => 'الزيارات ',
            'fields'         => [
                'id'                  => 'ID',
                'patient'             => 'المريض',
                'type'                => 'نوع الزياره',
                'date'                => 'تاريخ الزياره ',
                'conclusion'           => 'استنتاج',
                'documents'           => 'مستندات',
                'action'              => 'اكشن',
                'update_visit'      => 'تعديل الزياره ',
                'create_visit'      => 'اضافه زياره'
            ],

        ],
        'Home Request'                  =>  [
            'title'            => 'طلب كشف منزلي',
            'fields'         => [
                'id'                          => 'ID',
                'patient'                     => 'المريض',
                'required_date'                        => 'تاريخ الكشف المطلوب',
                'accepted_date'                        => 'تاريخ الموافقه	',
                'status'                  => 'الحاله',
                'action'                      => 'الاجراءات',
                'update_home_request'         => 'تعديل طلب الكشف',
                'create_home_request'         => 'اضافه طلب كشف منزلي '
            ],

        ],
        'Patient Query'                  =>  [
            'title'            => 'استعلامات المريض',
            'fields'         => [
                'id'                                   => 'ID',
                'patient'                              => 'المريض',
                'question'                             => 'السؤال',
                'question_date'                        => 'تاريخ السؤال',
                'response'                             => 'الاجابه',
                'response_date'                        => 'تاريخ الاجابه',
                'action'                               => 'الاجراءات',
                'update_patient_query'         => 'تعديل استعلام',
                'create_patient_query'         => 'اضافه استعلام'
            ],

        ],

        'sign out' => 'تسجيل خروج',
        'ok' => 'تم',
        'cancel' => 'إلفاء',
        'Are you sure?' => 'هل انت متأكد ؟',
        'warn deletion' => 'سيتم حذف هذا السجل وتفاصيله بشكل دائم !',
        'home' => 'الرئيسية',
        'doctors' => 'الاطباء',
        'users' => 'المستخدمين',


    ];
