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
        //พื้นที่บริการของสาขา
        'view branch_areas' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'พื้นที่บริการของสาขา',
        ],

        'create branch_areas' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'พื้นที่บริการของสาขา',
        ],

        'edit branch_areas' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'พื้นที่บริการของสาขา',
        ],

        'delete branch_areas' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'พื้นที่บริการของสาขา',
        ],


        ///ฝ่าย/แผนก
        'view departments' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ฝ่าย/แผนก',
        ],

        'create departments' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ฝ่าย/แผนก',
        ],

        'edit departments' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ฝ่าย/แผนก',
        ],

        'delete departments' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ฝ่าย/แผนก',
        ],

        //ตำแหน่งงาน
        'view positions' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ตำแหน่งงาน',
        ],

        'create positions' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ตำแหน่งงาน',
        ],

        'edit positions' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ตำแหน่งงาน',
        ],

        'delete positions' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ตำแหน่งงาน',
        ],
        //ประเภทใบขับขี่
        'view driving_license_types' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ประเภทใบขับขี่',
        ],

        'create driving_license_types' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ประเภทใบขับขี่',
        ],

        'edit driving_license_types' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ประเภทใบขับขี่',
        ],

        'delete driving_license_types' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ประเภทใบขับขี่',
        ],
        //พนักงาน
        'view employees' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'พนักงาน',
        ],

        'create employees' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'พนักงาน',
        ],

        'edit employees' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'พนักงาน',
        ],

        'delete employees' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'พนักงาน',
        ],
        //ประเภทรถ
        'view cartypes' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ประเภทรถ',
        ],

        'create cartypes' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ประเภทรถ',
        ],

        'edit cartypes' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ประเภทรถ',
        ],

        'delete cartypes' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ประเภทรถ',
        ],
        //ลักษณะรถ
        'view carstyles' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ลักษณะรถ',
        ],

        'create carstyles' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ลักษณะรถ',
        ],

        'edit carstyles' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ลักษณะรถ',
        ],

        'delete carstyles' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ลักษณะรถ',
        ],
        //ตำแหน่งยาง
        'view tiretypes' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ตำแหน่งยาง',
        ],

        'create tiretypes' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ตำแหน่งยาง',
        ],

        'edit tiretypes' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ตำแหน่งยาง',
        ],

        'delete tiretypes' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ตำแหน่งยาง',
        ],
        //ข้อมูลรถ
        'view cars' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ข้อมูลรถ',
        ],

        'create cars' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ข้อมูลรถ',
        ],

        'edit cars' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ข้อมูลรถ',
        ],

        'delete cars' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ข้อมูลรถ',
        ],

        //ประเภทธุรกิจ
        'view businesstypes' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ประเภทธุรกิจ',
        ],

        'create businesstypes' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ประเภทธุรกิจ',
        ],

        'edit businesstypes' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ประเภทธุรกิจ',
        ],

        'delete businesstypes' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ประเภทธุรกิจ',
        ],
        //ข้อมูลลุกค้า
        'view customers' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ข้อมูลลูกค้า',
        ],

        'create customers' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ข้อมูลลูกค้า',
        ],

        'edit customers' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ข้อมูลลูกค้า',
        ],

        'delete customers' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ข้อมูลลูกค้า',
        ],
        //ประเภทสินค้า
        'view categories' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ประเภทสินค้า',
        ],

        'create categories' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ประเภทสินค้า',
        ],

        'edit categories' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ประเภทสินค้า',
        ],

        'delete categories' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ประเภทสินค้า',
        ],
        //ลักษณะสินค้า
        'view productstyles' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ลักษณะสินค้า',
        ],

        'create productstyles' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ลักษณะสินค้า',
        ],

        'edit productstyles' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ลักษณะสินค้า',
        ],

        'delete productstyles' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ลักษณะสินค้า',
        ],
        //หน่วยนับ
        'view units' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'หน่วยนับ',
        ],

        'create units' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'หน่วยนับ',
        ],

        'edit units' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'หน่วยนับ',
        ],

        'delete units' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'หน่วยนับ',
        ],
        //สินค้า
        'view products' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'สินค้า',
        ],

        'create products' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'สินค้า',
        ],

        'edit products' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'สินค้า',
        ],

        'delete products' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'สินค้า',
        ],
        //พัสดุ
        'view parcels' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'พัสดุ',
        ],

        'create parcels' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'พัสดุ',
        ],

        'edit parcels' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'พัสดุ',
        ],

        'delete parcels' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'พัสดุ',
        ],
        //ค่าขนส่งตามสินค้า
        'view productservice_prices' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ค่าขนส่งตามสินค้า',
        ],

        'create productservice_prices' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ค่าขนส่งตามสินค้า',
        ],

        'edit productservice_prices' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ค่าขนส่งตามสินค้า',
        ],

        'delete productservice_prices' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ค่าขนส่งตามสินค้า',
        ],
        //ค่าขนส่งตามสินค้าตามลูกค้า
        'view customerproduct_prices' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ค่าขนส่งตามสินค้าตามลูกค้า',
        ],

        'create customerproduct_prices' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ค่าขนส่งตามสินค้าตามลูกค้า',
        ],

        'edit customerproduct_prices' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ค่าขนส่งตามสินค้าตามลูกค้า',
        ],

        'delete customerproduct_prices' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ค่าขนส่งตามสินค้าตามลูกค้า',
        ],
        //ค่าขนส่งพัสดุ
        'view service_prices' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ค่าขนส่งพัสดุ',
        ],

        'create service_prices' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ค่าขนส่งพัสดุ',
        ],

        'edit service_prices' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ค่าขนส่งพัสดุ',
        ],

        'delete service_prices' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ค่าขนส่งพัสดุ',
        ],
        //ค่าบริการอื่นๆ
        'view service_charges' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ค่าบริการอื่นๆ',
        ],

        'create service_charges' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ค่าบริการอื่นๆ',
        ],

        'edit service_charges' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ค่าบริการอื่นๆ',
        ],

        'delete service_charges' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ค่าบริการอื่นๆ',
        ],
        //เส้นทางขนส่งระหว่างสาขา
        'view routeto_branches' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'เส้นทางขนส่งระหว่างสาขา',
        ],

        'create routeto_branches' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'เส้นทางขนส่งระหว่างสาขา',
        ],

        'edit routeto_branches' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'เส้นทางขนส่งระหว่างสาขา',
        ],

        'delete routeto_branches' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'เส้นทางขนส่งระหว่างสาขา',
        ],
        //เส้นทางขนส่งของสาขา
        'view branch_routes' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'เส้นทางขนส่งของสาขา',
        ],

        'create branch_routes' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'เส้นทางขนส่งของสาขา',
        ],

        'edit branch_routes' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'เส้นทางขนส่งของสาขา',
        ],

        'delete branch_routes' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'เส้นทางขนส่งของสาขา',
        ],
        //ต้นทุนตามเส้นทางระหว่างสาขา
        'view routeto_branch_costs' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ต้นทุนตามเส้นทางระหว่างสาขา',
        ],

        'create routeto_branch_costs' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ต้นทุนตามเส้นทางระหว่างสาขา',
        ],

        'edit routeto_branch_costs' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ต้นทุนตามเส้นทางระหว่างสาขา',
        ],

        'delete routeto_branch_costs' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ต้นทุนตามเส้นทางระหว่างสาขา',
        ],
        //ต้นทุนตามเส้นทางขนส่งของสาขา
        'view branch_route_costs' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ต้นทุนตามเส้นทางขนส่งของสาขา',
        ],

        'create branch_route_costs' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ต้นทุนตามเส้นทางขนส่งของสาขา',
        ],

        'edit branch_route_costs' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ต้นทุนตามเส้นทางขนส่งของสาขา',
        ],

        'delete branch_route_costs' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ต้นทุนตามเส้นทางขนส่งของสาขา',
        ],
        //เส้นทางขนส่งเหมาคัน
        'view charter_routes' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'เส้นทางขนส่งเหมาคัน',
        ],

        'create charter_routes' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'เส้นทางขนส่งเหมาคัน',
        ],

        'edit charter_routes' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'เส้นทางขนส่งเหมาคัน',
        ],

        'delete charter_routes' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'เส้นทางขนส่งเหมาคัน',
        ],
        //ต้นทุนเส้นทางขนส่งเหมาคัน
        'view charter_route_costs' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ต้นทุนเส้นทางขนส่งเหมาคัน',
        ],

        'create charter_route_costs' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ต้นทุนเส้นทางขนส่งเหมาคัน',
        ],

        'edit charter_route_costs' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ต้นทุนเส้นทางขนส่งเหมาคัน',
        ],

        'delete charter_route_costs' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ต้นทุนเส้นทางขนส่งเหมาคัน',
        ],
        //ค่าขนส่งเหมาคัน
        'view charter_prices' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ค่าขนส่งเหมาคัน',
        ],

        'create charter_prices' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ค่าขนส่งเหมาคัน',
        ],

        'edit charter_prices' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ค่าขนส่งเหมาคัน',
        ],

        'delete charter_prices' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ค่าขนส่งเหมาคัน',
        ],
        //ใบเสนอราคาเหมาคัน
        'view quotations' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ใบเสนอราคาเหมาคัน',
        ],

        'create quotations' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ใบเสนอราคาเหมาคัน',
        ],

        'edit quotations' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ใบเสนอราคาเหมาคัน',
        ],

        'delete quotations' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ใบเสนอราคาเหมาคัน',
        ],
        //ใบงานขนส่งเหมาคัน
        'view charter_jobs' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ใบงานขนส่งเหมาคัน',
        ],

        'create charter_jobs' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ใบงานขนส่งเหมาคัน',
        ],

        'edit charter_jobs' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ใบงานขนส่งเหมาคัน',
        ],

        'delete charter_jobs' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ใบงานขนส่งเหมาคัน',
        ],
        //ผู้จำหน่าย
        'view vendors' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ผู้จำหน่าย',
        ],

        'create vendors' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ผู้จำหน่าย',
        ],

        'edit vendors' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ผู้จำหน่าย',
        ],

        'delete vendors' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ผู้จำหน่าย',
        ],
        //ค่าใช้จ่ายรถ
        'view car_expenses' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ค่าใช้จ่ายรถ',
        ],

        'create car_expenses' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ค่าใช้จ่ายรถ',
        ],

        'edit car_expenses' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ค่าใช้จ่ายรถ',
        ],

        'delete car_expenses' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ค่าใช้จ่ายรถ',
        ],
        //ค่าใช้จ่ายส่วนกลาง
        'view company_expenses' => [
            'display_name' => 'ดู',
            'description'  => 'ดู',
            'group'        => 'ค่าใช้จ่ายส่วนกลาง',
        ],

        'create company_expenses' => [
            'display_name' => 'สร้าง',
            'description'  => 'สร้าง',
            'group'        => 'ค่าใช้จ่ายส่วนกลาง',
        ],

        'edit company_expenses' => [
            'display_name' => 'แก้ไข',
            'description'  => 'แก้ไข',
            'group'        => 'ค่าใช้จ่ายส่วนกลาง',
        ],

        'delete company_expenses' => [
            'display_name' => 'ลบ',
            'description'  => 'ลบ',
            'group'        => 'ค่าใช้จ่ายส่วนกลาง',
        ],
    ],
];
