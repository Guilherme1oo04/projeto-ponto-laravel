<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function home() {
        return view('superAdmin.home');
    }

    public function addEmployee() {
        return view('superAdmin.addEmployee');
    }

    public function processAditionEmployee(Request $request) {

    }
}
