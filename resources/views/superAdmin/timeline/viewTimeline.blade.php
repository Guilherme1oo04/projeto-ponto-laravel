@extends('layouts.superAdmin')

@section('title', $timeline->name)

@section('content')

    <div class="tw-w-screen tw-flex tw-justify-center tw-mt-10">

        <div class="tw-bg-white tw-px-1 tw-py-2 tw-mx-2 tw-max-w-[750px] tw-w-[100%] tw-rounded-md tw-shadow-md tw-overflow-x-hidden">

            <div>

                <div class="tw-flex tw-px-2 tw-justify-between tw-align-top tw-gap-2 tw-pb-2">
                    <a href="{{route('admin.timelines.index')}}">
                        <svg data-slot="icon" class="tw-w-8 tw-bg-blue-700 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-blue-800" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"></path>
                        </svg>
                    </a>
                    <h1 class="tw-text-center tw-text-gray-900 tw-break-all tw-text-2xl sm:tw-text-3xl tw-font-semibold tw-max-w-96" style="text-shadow: 0.5px 0.5px 0px black">
                        {{$timeline->name}}
                    </h1>
                    <div class="tw-flex tw-gap-2">
                        <a href="#">
                            <svg data-slot="icon" class="tw-w-8 tw-bg-gray-600 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-gray-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                            </svg>
                        </a>
                        <a href="{{route('admin.timelines.delete', ['id' => $timeline->id])}}">
                            <svg data-slot="icon" class="tw-w-8 tw-bg-red-500 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-red-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="tw-w-full tw-h-[1.5px] tw-bg-gray-600"></div>
                
                <div class="tw-mt-4 tw-px-2 tw-flex tw-gap-2">
                    <div class="tw-flex-grow">
                        <h2 class="tw-bg-blue-700 tw-text-white tw-border-2 tw-border-gray-900 tw-border-b-0 tw-text-center tw-px-2 tw-py-1 tw-rounded-t-lg tw-font-semibold tw-text-sm sm:tw-text-base">
                            Descrição
                        </h2>
                        <h2 class="tw-text-gray-900 tw-border-2 tw-border-gray-900 tw-rounded-b-lg tw-px-2 tw-py-1 tw-shadow-md tw-overflow-hidden tw-text-md sm:tw-text-lg">
                            {{$timeline->description}} 
                        </h2>
                    </div>

                    <div>
                        <h2 class="tw-bg-blue-700 tw-text-white tw-border-2 tw-border-gray-900 tw-border-b-0 tw-text-center tw-px-2 tw-py-1 tw-rounded-t-lg tw-font-semibold tw-text-sm sm:tw-text-base">
                            Horas semanais
                        </h2>
                        <h2 class="tw-text-gray-900 tw-border-2 tw-border-gray-900 tw-px-2 tw-py-1 tw-text-center tw-rounded-b-lg tw-shadow-md tw-overflow-hidden tw-text-md sm:tw-text-lg">
                            {{$timeline->minimum_week_hours}}
                        </h2>
                    </div>
                </div>

                <div class="tw-flex tw-justify-center tw-px-2 tw-my-10">
                    <table class="tw-text-normal sm:tw-text-2xl tw-border-collapse tw-border-gray-900 tw-border-2 tw-text-center">
                        <tr>
                            @foreach (['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'] as $item)
                                <td class="tw-border-2 tw-border-gray-900 tw-p-1 sm:tw-w-20 sm:tw-p-2 tw-text-white tw-bg-gray-600">
                                    {{$item}}
                                </td>
                            @endforeach
                        </tr>

                        @foreach ($diasDoMes as $semana)
                            <tr>
                                @foreach ($semana as $dia)
                                    @if($dia != '')
                                        @if($dia['nonWork'] == true)
                                            <td class="tw-border-2 tw-border-gray-900 tw-p-1 sm:tw-p-2 tw-bg-blue-700 tw-text-white tw-cursor-pointer tw-select-none" x-data="{reasonOpen: false, closeButton: false}" @click.away="reasonOpen = false" @click="reasonOpen = true">
                                                
                                                <div 
                                                x-show="reasonOpen" 
                                                x-trap="reasonOpen" 
                                                x-transition:enter="tw-transition tw-ease-in tw-duration-300" 
                                                x-transition:enter-start="tw-opacity-0 tw--translate-x-[40%]" 
                                                x-transition:enter-end="tw-opacity-1 tw--translate-x-[50%]" 
                                                x-transition:leave="tw-transition tw-ease-out tw-duration-300" 
                                                x-transition:leave-start="tw-opacity-1 tw--translate-x-[50%]" 
                                                x-transition:leave-end="tw-opacity-0 tw--translate-x-[40%]" 
                                                x-on:mouseover="closeButton = true" 
                                                x-on:mouseout="closeButton = false" 
                                                class="tw-absolute tw-bg-white tw-text-gray-900 tw-text-base sm:tw-text-lg tw-border-2 tw-border-gray-900 tw-rounded-md tw-top-[50%] tw-left-[50%] tw--translate-x-[50%] tw--translate-y-[50%] tw-shadow-md tw-select-text tw-overflow-hidden tw-min-w-44"
                                                >
                                                    <p class="tw-bg-blue-700 tw-text-white tw-border-b-2 tw-border-gray-900 tw-p-1">
                                                        <svg x-show="closeButton" @click.stop="reasonOpen = false" 
                                                        class="tw-w-[24px] tw-h-[24px] tw-cursor-pointer tw-text-white tw-right-1 tw-rounded-[50%] tw-p-1 hover:tw-text-gray-800 hover:tw-bg-white tw-duration-200 tw-absolute" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

                                                        Motivo
                                                    </p>
                                                    
                                                    <p class="tw-px-2 tw-text-center tw-py-1">
                                                        @if(array_key_exists('reason', $dia))
                                                            {{$dia['reason']}}
                                                        @else
                                                            Dia definido como sem trabalho
                                                        @endif
                                                    </p>
                                                </div>

                                                {{$dia['day']}}
                                            </td>
                                        @else
                                            <td class="tw-border-2 tw-border-gray-900 tw-p-1 sm:tw-p-2 tw-select-none">
                                                {{$dia['day']}}
                                            </td>
                                        @endif
                                    @else
                                        <td class="tw-border-2 tw-border-gray-900 tw-p-1 sm:tw-p-2">
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>

        </div>

    </div>

@endsection