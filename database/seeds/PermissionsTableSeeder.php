<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-06-06 17:55:00',
            'updated_at' => '2019-06-06 17:55:00',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '17',
                'title'      => 'timeslot_create',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '18',
                'title'      => 'timeslot_edit',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '19',
                'title'      => 'timeslot_show',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '20',
                'title'      => 'timeslot_delete',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '21',
                'title'      => 'timeslot_access',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '22',
                'title'      => 'appointment_create',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '23',
                'title'      => 'appointment_edit',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '24',
                'title'      => 'appointment_show',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '25',
                'title'      => 'appointment_delete',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ],
            [
                'id'         => '26',
                'title'      => 'appointment_access',
                'created_at' => '2019-06-06 17:55:00',
                'updated_at' => '2019-06-06 17:55:00',
            ]];

        Permission::insert($permissions);
    }
}
