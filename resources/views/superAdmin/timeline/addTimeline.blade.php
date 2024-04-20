@extends('layouts.superAdmin')

@section('title', 'Add timeline')

@section('content')

    <div class="tw-flex tw-items-center tw-justify-center">
        
        <div class="tw-mx-2 tw-mt-12 tw-py-4 tw-px-3 tw-bg-white tw-border tw-rounded-2xl tw-shadow-sm tw-max-w-[450px] tw-mb-10">
            <div class="tw-py-5">
                <h1 class="tw-text-gray-800 tw-font-bold tw-text-2xl tw-block tw-text-center">
                    Adicionar timeline
                </h1>
                <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto">
                    Preencha as informações e adicione os dias sem trabalho a esta timeline
                </p>
            </div>

            <hr class="tw-mb-5">

            <form action="{{route('admin.timelines.store')}}" method="POST" id="form-timeline">
                @csrf
            
                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="name" class="tw-text-gray-900 tw-mb-1">Nome</label>
                    <input type="text" name="name" id="name" required class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700">
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="description" class="tw-text-gray-900 tw-mb-1">
                        Descrição
                    </label>
                    <textarea name="description" id="description" required style="resize: none" class="tw-border tw-h-28 tw-text-sm tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700"></textarea>
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="weekHours" class="tw-text-gray-900 tw-mb-1">Horas semanais</label>
                    <input type="number" inputmode="numeric" min="1" max="44" oninput="hoursFormatter('weekHours')" name="weekHours" id="weekHours" required class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700">
                </div>

                <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-mb-5">
                    <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto tw-mb-2">
                        Selecione os dias da semana que os funcionários não devem ir trabalhar
                    </p>
                    <div class="tw-flex tw-flex-wrap tw-gap-3 tw-mt-2 tw-items-center tw-justify-center">
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="sunday" value="sunday">
                            <label for="sunday" class="tw-text-gray-900 tw-select-none">
                                Domingo
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="monday" value="monday">
                            <label for="monday" class="tw-text-gray-900 tw-select-none">
                                Segunda-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="tuesday" value="tuesday">
                            <label for="tuesday" class="tw-text-gray-900 tw-select-none">
                                Terça-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="wednesday" value="wednesday">
                            <label for="wednesday" class="tw-text-gray-900 tw-select-none">
                                Quarta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="thursday" value="thursday">
                            <label for="thursday" class="tw-text-gray-900 tw-select-none">
                                Quinta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="friday" value="friday">
                            <label for="friday" class="tw-text-gray-900 tw-select-none">
                                Sexta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="saturday" value="saturday">
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
                        </div>

                    </div>

                    <input type="button" value="Remover dia" class="tw-text-md tw-max-w-32 tw-text-white tw-bg-red-500 tw-shadow-md tw-cursor-pointer tw-font-semibold tw-rounded-md tw-mb-3 tw-mt-6 tw-px-2 tw-py-2 hover:tw-bg-red-700" onclick="removeDay()">
                    <p class="tw-text-gray-500 tw-text-center tw-text-sm tw-mx-auto">
                        Os dias repetidos são ignorados e somente o primeiro é válido
                    </p>
                    <p class="tw-text-gray-500 tw-text-center tw-text-sm tw-mx-auto">
                        Clique no botão motivo para escrever a razão do dia sem trabalho
                    </p>
                </div>

                <input type="submit" value="Salvar timeline" class="tw-mt-6 tw-mb-3 tw-mx-auto tw-block tw-bg-blue-700 tw-text-white hover:tw-bg-blue-800 tw-px-3 tw-py-2 tw-rounded-3xl tw-cursor-pointer tw-shadow-md">
            </form>
        </div>

    </div>
    
    <script src="{{asset('js/timelines.js')}}"></script>
@endsection