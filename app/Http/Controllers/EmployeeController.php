<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index() {
        return view('superAdmin.employee.employees');
    }

    public function add() {
        return view('superAdmin.employee.addEmployee');
    }

    public function store(Request $request) {

    }
}
