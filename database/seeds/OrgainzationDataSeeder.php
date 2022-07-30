<?php

use App\Models\Admin\Organization;
use App\Models\Admin\UserOrganization;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\UserRoles;


class OrgainzationDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 20; $i++) {
            $owner = User::create([
                'name'  =>  $faker->name(),
                'phone' => $faker->phoneNumber(),
                'bio'   =>   $faker->sentence(),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt("123456789"), // password
                'remember_token' => Str::random(10),
            ]);

            $organization = Organization::create([
                'name' => $faker->unique()->name,'description'=> $faker->sentence,'country' => $faker->state,
                'city'=> $faker->city,'street'=> $faker->streetAddress,'postal_code' => $faker->postcode,
                'owner_id' => $owner->id, 'status'=> 1,
            ]);

            $request = new \Illuminate\Http\Request();
            Organization::AssignOwnerToOrganizationWithRoles($request,$owner,$organization);

            for ($j = 0;$j <= 500;$j++){
                $user = User::create([
                    'name'  =>  $faker->name(),
                    'phone' => $faker->phoneNumber(),
                    'bio'   =>   $faker->sentence(),
                    'email' => $faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'password' => bcrypt("123456789"), // password
                    'remember_token' => Str::random(10),
                ]);

                UserOrganization::create([
                    'organization_id' => $organization->id,
                    'user_id'         => $user->id,
                    'registered_at'   => Carbon::now(),
                    'status'          => 1,
                ]);

                $role = Role::select('id')->where('organization_id',$organization->id)->inRandomOrder()->first();
                UserRoles::create(['user_id' => $user->id,'role_id' => $role->id]);
            }
        }

    }
}
