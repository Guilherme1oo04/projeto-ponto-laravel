@extends('layouts.superAdmin')

@section('title', 'Add timeline')

@section('content')

    <div class="tw-flex tw-items-center tw-justify-center">
        
        <div class="tw-mx-2 tw-mt-12 tw-py-4 tw-px-3 tw-bg-white tw-border tw-rounded-2xl tw-shadow-sm tw-max-w-[390px]">
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

                <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
                    <p class="tw-text-gray-500 tw-text-center tw-mt-3 tw-max-w-96 tw-mx-auto tw-mb-2">
                        Selecione os dias da semana que os funcionários não precisam trabalhar
                    </p>
                    <div class="tw-flex tw-flex-wrap">
                        <div>
                            <input type="checkbox" name="weekDaysNonWork[]" id="sunday" value="sunday">
                            <label for="sunday">
                                Domingo
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="weekDaysNonWork[]" id="monday" value="monday">
                            <label for="monday">
                                Segunda-feira
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="weekDaysNonWork[]" id="tuesday" value="tuesday">
                            <label for="tuesday">
                                Terça-feira
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="weekDaysNonWork[]" id="wednesday" value="wednesday">
                            <label for="wednesday">
                                Quarta-feira
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="weekDaysNonWork[]" id="thursday" value="thursday">
                            <label for="thursday">
                                Quinta-feira
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="weekDaysNonWork[]" id="friday" value="friday">
                            <label for="friday">
                                Sexta-feira
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" name="weekDaysNonWork[]" id="saturday" value="saturday">
                            <label for="saturday">
                                Sábado
                            </label>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
    
@endsection