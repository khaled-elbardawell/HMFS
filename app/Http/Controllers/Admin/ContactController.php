<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:is_super_admin');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::page();
        $start_counter = Contact::getStartCounter();
        return view('admin.Contacts.index',compact('contacts','start_counter'));
    }// end method


}// end class
