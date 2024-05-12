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

        $timelines = Timeline::all();

        $daysRatio = [
            [
                'acronymPT' => "D",
                'day' => 'sunday'
            ],
            [
                'acronymPT' => "S",
                'day' => 'monday'
            ],
            [
                'acronymPT' => "T",
                'day' => 'tuesday'
            ],
            [
                'acronymPT' => "Q",
                'day' => 'wednesday'
            ],
            [
                'acronymPT' => "Q",
                'day' => 'thursday'
            ],
            [
                'acronymPT' => "S",
                'day' => 'friday'
            ],
            [
                'acronymPT' => "S",
                'day' => 'saturday'
            ],
        ];

        return view('superAdmin.timeline.timelines', [
            'timelines' => $timelines,
            'daysRatio' => $daysRatio,
        ]);
    }

    public function view(string $id) {
        $timeline = Timeline::find($id);
        if ($timeline) {

            $exceptionsDays = NonWorkDaysExceptions::where('timeline_name', $timeline->name)->get();
            
            $weekDaysNonWork = explode(',', $timeline->standard_non_work_days);

            $firstDay = date('Y-m-01');
            $qntDiasMes = Date::create($firstDay)->daysInMonth;
            $diasDoMes = [];
            $week = [];
            
            for ($dia = 1; $dia <= $qntDiasMes; $dia++) {
                if($dia < 10) {
                    $formatDay = "0$dia";
                } else {
                    $formatDay = "$dia";
                }

                $weekDayPtBr = Date::create(date("Y-m-$formatDay"))->locale('pt_BR')->dayName;
                $weekDayIndex = Date::create(date("Y-m-$formatDay"))->locale('pt_BR')->weekday();
                $weekDayEn = Date::create(date("Y-m-$formatDay"))->dayName;

                $nonWork = false;
                if (in_array(strtolower($weekDayEn), $weekDaysNonWork)) {
                    $nonWork = true;
                }

                $arrayDay = [
                    'day' => "$formatDay",
                    'weekDayPtBr' => $weekDayPtBr,
                    'weekDayIndex' => $weekDayIndex,
                    'nonWork' => $nonWork,
                ];

                $exceptionDayFiltered = array_filter($exceptionsDays->toArray(), function ($array) use ($formatDay) {
                    return $array['day'] === $formatDay;
                });

                if ($exceptionDayFiltered) {
                    $arrayDay['nonWork'] = true;
                    $arrayDay += ['reason' => $exceptionDayFiltered[array_key_first($exceptionDayFiltered)]['reason']];
                }

                $qntRemoverArray = 0;
                if ($dia == 1 && $weekDayIndex != 0) {
                    while ($qntRemoverArray < $weekDayIndex) {
                        $week[] = "";
                        $qntRemoverArray++;
                    }
                }

                $week[] = $arrayDay;

                if (count($week) == 7) {
                    $diasDoMes[] = $week;
                    $week = [];
                }

                if ($dia == $qntDiasMes) {
                    while(count($week) != 7) {
                        $week[] = "";
                    }
                    $diasDoMes[] = $week;
                    $week = [];
                }
            }


            return view('superAdmin.timeline.viewTimeline', [
                'timeline' => $timeline,
                'diasDoMes' => $diasDoMes
            ]);

        } else {
            return redirect()->back();
        }
    }

    public function add() {
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

        return view('superAdmin.timeline.addTimeline', [
            'dias' => $diasDoMes
        ]);
    }

    public function store(Request $request) {

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

                $arrayDay = array(
                    'day' => $day,
                    'reason' => $reason
                );

                $exceptionDayFound = array_filter($exceptionsDaysNonWork, function($array) use ($arrayDay) {
                    return $array['day'] == $arrayDay['day'];
                });

                if (empty($exceptionDayFound)) {
                    $exceptionsDaysNonWork[] = $arrayDay;
                }
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

    public function delete(string $id) {
        $timeline = Timeline::find($id);

        if(!$timeline) {
            return redirect()->route('admin.timelines.index')->with('message', 'Essa timeline não existe')->with('status', 'error');
        }

        try {
            DB::transaction(function() use ($timeline) {
                $exceptionsDays = NonWorkDaysExceptions::where('timeline_name', $timeline->name)->get();

                foreach($exceptionsDays as $exceptionDay) {
                    NonWorkDaysExceptions::destroy($exceptionDay->id);
                }

                Timeline::destroy($timeline->id);
            });

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.timelines.index')->with('message', 'Erro ao excluir')->with('status', 'error');
        }

        return redirect()->route('admin.timelines.index')->with('message', 'Timeline deletada com sucesso!')->with('status', 'sucess');
    }
}
