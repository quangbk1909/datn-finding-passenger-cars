<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\User;

class OrganizationController extends Controller
{
    public function show($id) {
    	$organization = Organization::find($id);
    	$staff = User::where("organization_id", "=",$id)->limit(5)->get();
    	$othersOrganization = Organization::where("id", "!=", $id)->limit(5)->get();
    	return view("pages.organization", compact("organization", "staff", "othersOrganization"));
    }
}
