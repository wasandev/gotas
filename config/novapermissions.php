<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'userModel' => 'App\Models\Tenant\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'userResource' => 'App\Nova\User',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'roleResourceGroup' => '1.งานสำหรับผู้ดูแลระบบ',

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [
        //1.สำหรับผู้ดูแลระบบ
        //-users
        'view users' => [
            'display_name' => 'ดู',
            'description'  => 'ดูข้อมูลผู้ใช้งาน',
            'group'        => 'ผู้ใช้งาน',
        ],

        'create users' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้างผู้ใช้งาน',
            'group'        => 'ผู้ใช้งาน',
        ],

        'edit users' => [
            'display_name' => 'แก้ไข',
            'description'  => 'Can edit users',
            'group'        => 'ผู้ใช้งาน',
        ],

        'delete users' => [
            'display_name' => 'ลบ',
            'description'  => 'Can delete users',
            'group'        => 'ผู้ใช้งาน',
        ],
        //Role
        'view roles' => [
            'display_name' => 'ดู',
            'description'  => 'Can view roles',
            'group'        => 'สิทธิ์การใช้งาน',
        ],

        'create roles' => [
            'display_name' => 'สร้าง',
            'description'  => 'Can create roles',
            'group'        => 'สิทธิ์การใช้งาน',
        ],

        'edit roles' => [
            'display_name' => 'แก้ไข',
            'description'  => 'Can edit roles',
            'group'        => 'สิทธิ์การใช้งาน',
        ],

        'delete roles' => [
            'display_name' => 'ลบ',
            'description'  => 'Can delete roles',
            'group'        => 'สิทธิ์การใช้งาน',
        ],
        //CompanyProfile
        'view companyprofile' => [
            'display_name' => 'ดู',
            'description'  => 'ดูข้อมูลบริษัท',
            'group'        => 'ข้อมูลบริษัท',
        ],

        'edit companyprofile' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไขข้อมูลบริษัท',
            'group'        => 'ข้อมูลบริษัท',
        ],

        //Branch
        'view branches' => [
            'display_name' => 'ดู',
            'description'  => 'ดูข้อมูลสาขา',
            'group'        => 'ข้อมูลสาขา',
        ],

        'create branches' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้างข้อมูลสาขา',
            'group'        => 'ข้อมูลสาขา',
        ],

        'edit branches' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไขข้อมูลสาขา',
            'group'        => 'ข้อมูลสาขา',
        ],

        'delete branches' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบข้อมูลสาขา',
            'group'        => 'ข้อมูลสาขา',
        ],


    ],
];
