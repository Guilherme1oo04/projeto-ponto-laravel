<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NonWorkDaysExceptions;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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

    public function storeTimeline(Request $request) {

        $name = $request->name;
        $description = $request->description;
        $weekHours = intval($request->weekHours);
        $weekDaysNonWork = "";
        $exceptionsDaysNonWork = [];

        foreach ($request->weekDaysNonWork as $day) {
            $weekDaysNonWork .= "$day,";
        }

        foreach ($request->all() as $key => $exception) {
            if(str_starts_with($key, "exception-day-select-n")) {
                $day = $exception;
                $numInput = str_replace("exception-day-select-n", "", $key);
                $keyReason = "exception-day-textarea-n$numInput";
                $reason = $request->$keyReason;

                $exceptionsDaysNonWork[] = array(
                    'day' => $day,
                    'reason' => $reason
                );
            }
        }

        try {
            DB::transaction(function() use ($name, $description, $weekHours, $weekDaysNonWork, $exceptionsDaysNonWork) {
                Timeline::create([
                    'name' => $name,
                    'description' => $description,
                    'minimum_week_hours' => $weekHours,
                    'standard_non_work_days' => $weekDaysNonWork
                ]);

                foreach ($exceptionsDaysNonWork as $exception) {
                    NonWorkDaysExceptions::create([
                        'timeline_name' => $name,
                        'day' => $exception['day'],
                        'reason' => $exception['reason']
                    ]);
                }

            });

            return redirect()->route('admin.timelines.index')->with('message', 'Timeline criada com sucesso!')->with('status', 'sucess');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.timelines.index')->with('message', "Erro na criação: " . $e->getMessage())->with('status', 'error');
        }
    }
}
