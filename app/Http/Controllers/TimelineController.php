<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TimelineController extends Controller
{
    public function index() {

        return view('superAdmin.timelines');
    }

    public function addTimeline() {
        $dataAtual = date('Y-m-d');
        $qntDiasMes = Date::create($dataAtual)->daysInMonth;


        $diasDoMes = [];
        
        for ($dia = 1; $dia <= $qntDiasMes; $dia++) {
            if($dia < 10) {
                $diasDoMes[] = "0$dia";
            } else {
                $diasDoMes[] = "$dia";
            }
        }

        return view('superAdmin.addTimeline', [
            'dias' => $diasDoMes
        ]);
    }

    public function processAditionTimeline() {
        
    }
}
