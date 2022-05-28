<?php

namespace App\Http\ViewComposers;


use Illuminate\Contracts\View\View;

class MyViewComposer {

    public function compose(View $view) {
//        $user = UserOrganization::where('user_id',auth()->user()->id)->with(['organization','user.userRole.role.organization'])->first();
//        $view->with(['user'=>$user]);
    }
}
