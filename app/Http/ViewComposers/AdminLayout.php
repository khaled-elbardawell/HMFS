<?php

namespace App\Http\ViewComposers;


use App\Models\Admin\UserOrganization;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class AdminLayout {

    public function compose(View $view) {
        if(!Gate::allows('is_super_admin')){
            $userOrganizations = UserOrganization::sqlGet("SELECT organizations.* , user_organizations.user_id,uploads.file FROM user_organizations
                                                    INNER JOIN organizations ON organizations.id = user_organizations.organization_id
                                                    INNER JOIN uploads ON uploads.uploadable_id = organizations.id AND uploads.uploadable_type='App\\\Models\\\Admin\\\Organization'
                                                    WHERE user_organizations.user_id = ?",[auth()->id()]);
            $view->with(['userOrganizations' => $userOrganizations]);
        }

    }
}
