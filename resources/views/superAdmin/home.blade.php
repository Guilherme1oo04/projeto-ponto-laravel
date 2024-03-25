@extends('layouts.superAdmin')

@section('title', 'Admin Home')

@section('content')
    
    <div class="tw-min-h-[70vh] tw-flex tw-flex-col md:tw-mx-44 sm:tw-mx-32 tw-mx-10">
        
        <h1 class="tw-text-slate-900 tw-font-semibold md:tw-text-3xl tw-text-xl tw-mt-4" style="text-shadow: 0.5px 0.5px 0px black">
            Bem vindo, {{Auth::user()->name}}
        </h1>

        <div class="tw-flex tw-mt-5 tw-justify-around tw-gap-3 tw-flex-wrap">
            <div class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-w-48 tw-h-56 tw-rounded-md tw-bg-slate-500 tw-shadow-lg tw-border-2 tw-border-slate-800">
                <h1>
                    Adicionar funcionário
                </h1>
                <span class="material-symbols-outlined">
                    person_add
                </span>
            </div>

            <div class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-w-48 tw-h-56 tw-rounded-md tw-bg-slate-500 tw-shadow-lg tw-border-2 tw-border-slate-800">
                <h1>
                    Atestados
                </h1>
                <span class="material-symbols-outlined">
                    health_and_safety
                </span>
            </div>

            <div class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-w-48 tw-h-56 tw-rounded-md tw-bg-slate-500 tw-shadow-lg tw-border-2 tw-border-slate-800">
                <h1>
                    Relatórios
                </h1>
                <span class="material-symbols-outlined">
                    lab_profile
                </span>
            </div>

        </div>

    </div>

@endsection