<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Department;
use App\Models\Admin\HealthProfile;
use App\Models\Admin\Organization;
use App\Models\Admin\UserOrganization;
use Modules\Reservations\Entities\Reservation;
use Modules\Role\Entities\Role;
use Modules\Task\Entities\Board;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersRolesCount = $this->getUsersRolesCount();
        $allUsersCount = $this->getAllUsersCount($usersRolesCount);
        $rolesCount = $this->getRolesCount();
        $organizationsCount = $this->getOrganizationsCount();
        $departmentsCount = $this->getDepartmentsCount();
        $reservationsCount = $this->getReservationsCount();
        $boardsCount = $this->getBoards();
        $healthProfilesCount = $this->getHealthProfilesCount();
        $latestReservations = $this->getLatestReservationsData();

//        dd($latestReservations[0]->id);

        return view('admin.home',compact('latestReservations','allUsersCount','healthProfilesCount','boardsCount','reservationsCount','usersRolesCount','organizationsCount','rolesCount','departmentsCount'));
    }// end method



    private function getLatestReservationsData(){
        $sql = "SELECT reservations.*,doctors.name as doctor_name,users.name as user_name,
                       IF(reservations.status = 0,'Not Complete','Complete') as status_text FROM reservations
                     INNER JOIN users ON users.id = reservations.user_id
                     INNER JOIN users as doctors ON doctors.id = reservations.doctor_id ";

        $bindings = [];
        if (session()->has('organization_id')){
            $sql .= " WHERE reservations.organization_id = ?";

            $bindings = [session()->get('organization_id')];
        }

        $sql .= " ORDER BY reservations.reservation_date DESC LIMIT 8";
        return Reservation::sqlGet($sql,$bindings);
    }

    /**
     * @param $usersRolesCount
     * @return int
     */
    private function getAllUsersCount($usersRolesCount){
        $count = 0;
        if ($usersRolesCount){
            foreach ($usersRolesCount as $users){
                $count += $users->count;
            }
        }
        return $count;
    }// end method



    /**
     * @return mixed|null
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function getHealthProfilesCount(){
        $sql = "SELECT COUNT(*) as 'count' FROM `health_profiles`";

        $bindings = [];
        if (session()->has('organization_id')){
            $sql .= "INNER JOIN user_organizations ON user_organizations.user_id = health_profiles.user_id AND user_organizations.organization_id = ?";
            $bindings = [session()->get('organization_id')];
        }
        return HealthProfile::sqlFirst($sql,$bindings);
    }// end method





    /**
     * @return mixed|null
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function getBoards(){
        $sql = "SELECT COUNT(*) as `count` FROM `boards`";

        $bindings = [];
        if (session()->has('organization_id')){
            $sql .= " WHERE organization_id = ?";
            $bindings = [session()->get('organization_id')];
        }
        return Board::sqlFirst($sql,$bindings);
    }// end method





    /**
     * @return mixed|null
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function getReservationsCount(){
        $sql = "SELECT  COUNT(IF(status = 0,true,NULL)) as not_complete_reservations ,
                        COUNT(IF(status = 1,true,NULL)) as complete_reservations
                        FROM `reservations` ";

        $bindings = [];
        if (session()->has('organization_id')){
            $sql .= " WHERE organization_id = ?";
            $bindings = [session()->get('organization_id')];
        }
        return Reservation::sqlFirst($sql,$bindings);
    }// end method





    /**
     * @return mixed|null
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function getDepartmentsCount(){
        $sql = "SELECT COUNT(*) as `count` FROM departments";
        $bindings = [];
        if (session()->has('organization_id')){
            $sql .= " WHERE organization_id = ?";
            $bindings = [session()->get('organization_id')];
        }
        return Department::sqlFirst($sql,$bindings);
    }// end method




    /**
     * @return mixed|null
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function getRolesCount(){
        $sql = "SELECT COUNT(*) as `count` FROM roles";
        $bindings = [];
        if (session()->has('organization_id')){
            $sql .= " WHERE organization_id = ?";
            $bindings = [session()->get('organization_id')];
        }
        return Role::sqlFirst($sql,$bindings);
    }// end method



    /**
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function getUsersRolesCount(){
        $sql = "SELECT roles.role_type_id,roles.name,COUNT(user_organizations.user_id) as `count` FROM roles
                LEFT JOIN user_roles ON roles.id = user_roles.role_id
                LEFT JOIN user_organizations ON user_roles.user_id = user_organizations.user_id
                WHERE roles.id != 1";

        $bindings = [];
        if (session()->has('organization_id')){
            $sql .= " AND roles.organization_id = ?";
            $bindings = [session()->get('organization_id')];
        }
        $sql .= " GROUP BY roles.role_type_id , roles.name";

       return UserOrganization::sqlGet($sql,$bindings);
    }// end method



    /**
     * @return mixed|null
     */
    private function getOrganizationsCount(){
        $sql = "SELECT COUNT(*) as `count` FROM organizations";
        return Organization::sqlFirst($sql);
    }// end method


}// end class
