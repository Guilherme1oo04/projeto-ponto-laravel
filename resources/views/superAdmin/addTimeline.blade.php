@extends('layouts.superAdmin')

@section('title', 'Add timeline')

@section('content')

    <div class="tw-flex tw-items-center tw-justify-center">
        
        <div class="tw-mx-2 tw-mt-12 tw-py-4 tw-px-3 tw-bg-white tw-border tw-rounded-2xl tw-shadow-sm tw-max-w-[450px]">
            <div class="tw-py-5">
                <h1 class="tw-text-gray-800 tw-font-bold tw-text-2xl tw-block tw-text-center">
                    Adicionar timeline
                </h1>
                <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto">
                    Preencha as informações e adicione os dias sem trabalho a esta timeline
                </p>
            </div>

            <hr class="tw-mb-5">

            <form action="{{route('admin.timelines.processAdition')}}">
            
                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="name" class="tw-text-gray-900 tw-mb-1">Nome</label>
                    <input type="text" name="name" id="name" class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700">
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="description" class="tw-text-gray-900 tw-mb-1">
                        Descrição
                    </label>
                    <textarea name="description" id="description" style="resize: none" class="tw-border tw-h-28 tw-text-sm tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700"></textarea>
                </div>

                <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-mb-5">
                    <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto tw-mb-2">
                        Selecione os dias da semana que os funcionários não precisam trabalhar
                    </p>
                    <div class="tw-flex tw-flex-wrap tw-gap-3 tw-mt-2 tw-items-center tw-justify-center">
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="sunday" value="sunday">
                            <label for="sunday" class="tw-text-gray-900">
                                Domingo
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="monday" value="monday">
                            <label for="monday" class="tw-text-gray-900">
                                Segunda-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="tuesday" value="tuesday">
                            <label for="tuesday" class="tw-text-gray-900">
                                Terça-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="wednesday" value="wednesday">
                            <label for="wednesday" class="tw-text-gray-900">
                                Quarta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="thursday" value="thursday">
                            <label for="thursday" class="tw-text-gray-900">
                                Quinta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="friday" value="friday">
                            <label for="friday" class="tw-text-gray-900">
                                Sexta-feira
                            </label>
                        </div>
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-x-1">
                            <input type="checkbox" class="tw-w-4 tw-h-4" name="weekDaysNonWork[]" id="saturday" value="saturday">
                            <label for="saturday" class="tw-text-gray-900">
                                Sábado
                            </label>
                        </div>
                    </div>
                </div>

                <hr class="tw-mb-5">

                <div>
                    <div>
                        <p>
                            Clique no botão para adicionar dias específicos sem trabalho
                        </p>
                        <p>
                            Obs: No início de cada mês esses dias são excluídos da timeline
                        </p>
                    </div>
                </div>

            </form>
        </div>

    </div>
    
@endsection