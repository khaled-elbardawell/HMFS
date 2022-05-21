<?php
namespace Database\Seedes;

use Illuminate\Database\Seeder;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\Permission;
use Modules\Role\Entities\UserRoles;

class RolesWithUsersAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['id' => 1,'name' => "Super Admin",'status' => 0]);
        $user1 = \App\User::firstOrCreate(['email' => "elbardawellkhaled@gmail.com"],[
            'name'     => "khaled Elbardawell",
            'password' => bcrypt("111111111"),
        ]);

        $user2 = \App\User::firstOrCreate(['email' => "jihad@gmail.com"],[
            'name'     => "Jihad Hamdan",
            'password' => bcrypt("111111111"),
        ]);

        $user3 = \App\User::firstOrCreate(['email' => "rajab@gmail.com"],[
            'name'     => "Rajab Abed",
            'password' => bcrypt("111111111"),
        ]);

       UserRoles::firstOrCreate(['role_id' => 1 , 'user_id' => $user1->id]);
       UserRoles::firstOrCreate(['role_id' => 1 , 'user_id' => $user2->id]);
       UserRoles::firstOrCreate(['role_id' => 1 , 'user_id' => $user3->id]);

        $permissionsArr = config('permissions');
        foreach ($permissionsArr as $key => $value){
            Permission::firstOrCreate(['name' => $key],[
                "name"  => $key,
                "title" => $value,
           ]);
        }

    }
}
