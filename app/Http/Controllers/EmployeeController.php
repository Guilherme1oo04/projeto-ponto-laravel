<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function addEmployee() {
        return view('superAdmin.addEmployee');
    }

    public function processAditionEmployee(Request $request) {

    }
}
