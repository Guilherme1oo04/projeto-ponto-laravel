<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index() {

        return view('superAdmin.timelines');
    }

    public function addTimeline() {
        return view('superAdmin.addTimeline');
    }

    public function processAditionTimeline() {
        
    }
}
