@extends('layouts.superAdmin')

@section('title', 'Edit timeline')

@section('content')

    <div class="tw-flex tw-items-center tw-justify-center">
        
        <div class="tw-mx-2 tw-mt-12 tw-py-4 tw-px-3 tw-bg-white tw-border tw-rounded-2xl tw-shadow-sm tw-max-w-[450px] tw-mb-10">
            <a href="{{route('admin.timelines.index')}}">
                <svg data-slot="icon" class="tw-w-8 tw-bg-blue-700 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-blue-800" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"></path>
                </svg>
            </a>
            <div class="tw-pb-5">
                <h1 class="tw-text-gray-800 tw-font-bold tw-text-2xl tw-block tw-text-center">
                    Editar timeline
                </h1>
                <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto">
                    Atualize as informações e salve o resultado
                </p>
            </div>

            <hr class="tw-mb-5">

            <form action="{{route('admin.timelines.update', ['id' => $timeline->id])}}" method="POST" id="form-timeline">
                @csrf

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="name" class="tw-text-gray-900 tw-mb-1">Nome</label>
                    <input type="text" name="name" id="name" required class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700" value="{{$timeline->name}}">
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="description" class="tw-text-gray-900 tw-mb-1">
                        Descrição
                    </label>
                    <textarea name="description" id="description" required style="resize: none" class="tw-border tw-h-28 tw-text-sm tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700">{{$timeline->description}}</textarea>
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="weekHours" class="tw-text-gray-900 tw-mb-1">Horas semanais</label>
                    <input type="number" inputmode="numeric" min="1" max="44" oninput="hoursFormatter('weekHours')" name="weekHours" id="weekHours" required class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700" value="{{$timeline->minimum_week_hours}}">
                </div>

                <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-mb-5">
                    <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto tw-mb-2">
                        Selecione os dias da semana que os funcionários não devem ir trabalhar
                    </p>
                    <div class="tw-flex tw-flex-wrap tw-gap-3 tw-mt-2 tw-items-center tw-justify-center">
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="sunday" value="sunday" 
                            @checked(strpos($timeline->standard_non_work_days, 'sunday') !== false)
                            >
                            <label for="sunday" class="tw-text-gray-900 tw-select-none">
                                Domingo
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="monday" value="monday" 
                                @checked(strpos($timeline->standard_non_work_days, 'monday') !== false)
                            >
                            <label for="monday" class="tw-text-gray-900 tw-select-none">
                                Segunda-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="tuesday" value="tuesday" 
                                @checked(strpos($timeline->standard_non_work_days, 'tuesday') !== false)
                            >
                            <label for="tuesday" class="tw-text-gray-900 tw-select-none">
                                Terça-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="wednesday" value="wednesday" 
                                @checked(strpos($timeline->standard_non_work_days, 'wednesday') !== false)
                            >
                            <label for="wednesday" class="tw-text-gray-900 tw-select-none">
                                Quarta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="thursday" value="thursday" 
                                @checked(strpos($timeline->standard_non_work_days, 'thursday') !== false)
                            >
                            <label for="thursday" class="tw-text-gray-900 tw-select-none">
                                Quinta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="friday" value="friday" 
                                @checked(strpos($timeline->standard_non_work_days, 'friday') !== false)
                            >
                            <label for="friday" class="tw-text-gray-900 tw-select-none">
                                Sexta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="saturday" value="saturday" 
                                @checked(strpos($timeline->standard_non_work_days, 'saturday') !== false)
                            >
                            <label for="saturday" class="tw-text-gray-900 tw-select-none">
                                Sábado
                            </label>
                        </div>
                    </div>
                </div>

                <hr class="tw-mb-5">

                <div class="tw-flex tw-flex-col tw-justify-center tw-items-center">
                    <div class="tw-mb-4">
                        <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto">
                            Clique no botão para adicionar dias específicos sem trabalho
                        </p>
                        <p class="tw-text-gray-500 tw-text-center tw-text-sm tw-mx-auto">
                            Obs: No início de cada mês esses dias são excluídos da timeline
                        </p>
                    </div>

                    <input type="button" value="Adicionar dia" class="tw-text-md tw-max-w-32 tw-text-white tw-bg-blue-500 tw-shadow-md tw-cursor-pointer tw-font-semibold tw-rounded-md tw-mb-5 tw-px-2 tw-py-2 hover:tw-bg-blue-600" onclick="addDay({{end($dias)}})">

                    <div id="exception-no-work-days" class="tw-w-full tw-px-7">
                        <hr class="tw-mb-4">

                        <div id="exception-day-field-example" class="tw-items-center tw-hidden tw-mb-2">

                            <select id="exception-day-select-example" class="tw-w-20 tw-border tw-py-1 tw-rounded-md tw-shadow-sm">
                                @foreach ($dias as $dia)
                                    <option value="{{$dia}}">Dia {{$dia}}</option>
                                @endforeach
                            </select>
                            
                            <div class="tw-flex" id="exception-day-textarea-box-example" x-data="{textAreaOpen: false}" @click.away="textAreaOpen=false">
                                <label id="exception-day-label-textarea-example" for="exception-day-textarea-example" class="tw-mb-1 tw-ml-2 tw-bg-blue-600 hover:tw-bg-blue-700 tw-text-white tw-select-none tw-px-1 tw-py-0.5 tw-rounded-sm tw-shadow-sm" @click="textAreaOpen = !textAreaOpen">
                                    Motivo
                                </label>
                                <span id="exception-day-span-textarea-example" x-show="textAreaOpen" x-trap="textAreaOpen">
                                    <textarea id="exception-day-textarea-example" style="resize: none;" class="tw-absolute tw-duration-75 tw-ease-linear tw-border tw-h-20 tw-w-48 tw-text-sm tw-rounded-md tw-px-3 tw-py-2 tw-ml-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700"></textarea>
                                </span>
                            </div>

                            <button type="button" id="exception-day-remove-button-example">
                                <svg data-slot="icon" class="tw-w-6 tw-ml-2  tw-bg-red-500 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-red-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                                </svg>
                            </button>
                        </div>

                        @foreach ($exceptionsDays as $key => $exceptionDay)

                            <div id="exception-day-field-n{{$key + 1}}" class="tw-items-center tw-flex tw-mb-2">

                                <select id="exception-day-select-n{{$key + 1}}" name="exception-day-select-n{{$key + 1}}" class="tw-w-20 tw-border tw-py-1 tw-rounded-md tw-shadow-sm">
                                    @foreach ($dias as $dia)
                                        <option value="{{$dia}}" @selected($dia == $exceptionDay->day)>Dia {{$dia}}</option>
                                    @endforeach
                                </select>
                                
                                <div class="tw-flex" id="exception-day-textarea-box-n{{$key + 1}}" x-data="{textAreaOpen: false}" @click.away="textAreaOpen=false">
                                    <label id="exception-day-label-textarea-n{{$key + 1}}" for="exception-day-textarea-n{{$key + 1}}" class="tw-mb-1 tw-ml-2 tw-bg-blue-600 hover:tw-bg-blue-700 tw-text-white tw-select-none tw-px-1 tw-py-0.5 tw-rounded-sm tw-shadow-sm" @click="textAreaOpen = !textAreaOpen">
                                        Motivo
                                    </label>
                                    <span id="exception-day-span-textarea-n{{$key + 1}}" x-show="textAreaOpen" x-trap="textAreaOpen">
                                        <textarea id="exception-day-textarea-n{{$key + 1}}" name="exception-day-textarea-n{{$key + 1}}" style="resize: none;" class="tw-absolute tw-duration-75 tw-ease-linear tw-border tw-h-20 tw-w-48 tw-text-sm tw-rounded-md tw-px-3 tw-py-2 tw-ml-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700">{{$exceptionDay->reason}}</textarea>
                                    </span>
                                </div>

                                <button type="button" id="exception-day-remove-button-n{{$key + 1}}" onclick="removeDay({{$key + 1}})">
                                    <svg data-slot="icon" class="tw-w-6 tw-ml-2  tw-bg-red-500 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-red-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                                    </svg>
                                </button>
                            </div>
                            
                        @endforeach

                    </div>
                    <p class="tw-text-gray-500 tw-text-center tw-text-sm tw-mx-auto tw-mt-2">
                        Os dias repetidos são ignorados e somente o primeiro é válido
                    </p>
                    <p class="tw-text-gray-500 tw-text-center tw-text-sm tw-mx-auto">
                        Clique no botão motivo para escrever a razão do dia sem trabalho
                    </p>
                </div>

                <input type="submit" value="Atualizar timeline" class="tw-mt-6 tw-mb-3 tw-mx-auto tw-block tw-bg-blue-700 tw-text-white hover:tw-bg-blue-800 tw-px-3 tw-py-2 tw-rounded-3xl tw-cursor-pointer tw-shadow-md">
            </form>
        </div>

    </div>
    
    <script src="{{asset('js/timelines.js')}}"></script>
@endsection