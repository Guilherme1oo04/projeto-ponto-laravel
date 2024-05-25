@extends('layouts.superAdmin')

@section('title', 'Timelines')

@section('content')

@if (session('message'))

    <div class="tw-flex tw-justify-end tw-w-full tw-absolute" 
    x-data="{show: false, closeButton: false}" 
    x-init="setTimeout(() => show = true, 1000)" 
    x-show="show"  
    x-transition:enter="tw-transition tw-ease-out tw-duration-300"
    x-transition:enter-start="tw-opacity-0 tw-scale-90"
    x-transition:enter-end="tw-opacity-100 tw-scale-100"
    x-transition:leave="tw-transition tw-ease-in tw-duration-300"
    x-transition:leave-start="tw-opacity-100 tw-scale-100"
    x-transition:leave-end="tw-opacity-0 tw-scale-90"
    id="notification" >
        <p class="tw-w-full tw-max-w-72 tw-mt-3 tw-mx-3 tw-top-0 tw-bg-white tw-py-3 tw-px-2 tw-flex tw-items-center tw-shadow-md" x-on:mouseover="closeButton = true" x-on:mouseout="closeButton = false">
        
            @if (session('status') == 'sucess')
                <svg class="tw-w-[18px] tw-h-[18px] tw-mr-1 tw-text-green-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM16.7744 9.63269C17.1238 9.20501 17.0604 8.57503 16.6327 8.22559C16.2051 7.87615 15.5751 7.93957 15.2256 8.36725L10.6321 13.9892L8.65936 12.2524C8.24484 11.8874 7.61295 11.9276 7.248 12.3421C6.88304 12.7566 6.92322 13.3885 7.33774 13.7535L9.31046 15.4903C10.1612 16.2393 11.4637 16.1324 12.1808 15.2547L16.7744 9.63269Z" fill="currentColor"></path></svg>
            @else
                <svg class="tw-w-[18px] tw-h-[18px] tw-mr-1 tw-text-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9996 7C12.5519 7 12.9996 7.44772 12.9996 8V12C12.9996 12.5523 12.5519 13 11.9996 13C11.4474 13 10.9996 12.5523 10.9996 12V8C10.9996 7.44772 11.4474 7 11.9996 7ZM12.001 14.99C11.4488 14.9892 11.0004 15.4363 10.9997 15.9886L10.9996 15.9986C10.9989 16.5509 11.446 16.9992 11.9982 17C12.5505 17.0008 12.9989 16.5537 12.9996 16.0014L12.9996 15.9914C13.0004 15.4391 12.5533 14.9908 12.001 14.99Z" fill="currentColor"></path></svg>
            @endif

            <strong>{{session('message')}}</strong>

            <svg x-show="closeButton" @click="show = false" class="tw-w-[24px] tw-h-[24px] tw-cursor-pointer tw-ml-auto tw-rounded-[50%] tw-p-1 hover:tw-bg-gray-200 tw-text-gray-800 tw-duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </p>
    </div>
    
@endif

    <div class="tw-w-screen tw-flex tw-justify-center tw-items-center tw-py-5">
        <a href="{{route('admin.timelines.add')}}" class="tw-font-semibold tw-text-lg tw-text-white tw-bg-blue-700 tw-py-2 tw-px-3 tw-rounded-3xl tw-flex tw-justify-center tw-items-center tw-shadow-md tw-duration-200 tw-ease-linear hover:tw-bg-blue-800 hover:tw-shadow-lg">
            <svg data-slot="icon" class="tw-w-6 tw-mr-2" fill="none" stroke-width="2.6" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg>

            Nova timeline
        </a>
    </div>

    <div>
        <h1 class="tw-text-2xl tw-font-semibold tw-text-gray-700 tw-ml-3">
            Timelines
        </h1>
        <div class="tw-w-screen tw-h-0.5 tw-bg-gray-300"></div>

        <div class="tw-flex tw-justify-center tw-flex-wrap tw-gap-3 tw-px-2 tw-py-3">
            @foreach ($timelines as $timeline)
                <div class="tw-bg-white tw-px-4 tw-py-6 tw-rounded-md tw-border tw-shadow-md">
                    <div class="tw-mb-2">
                        <h1 class="tw-text-2xl sm:tw-text-3xl tw-font-bold tw-text-gray-900 tw-max-w-72">
                            {{$timeline->name}}
                        </h1>
                    </div>

                    <div class="tw-mb-2">
                        <p class="tw-text-gray-600 tw-font-semibold tw-text-md sm:tw-text-lg tw-max-w-72">
                            {{$timeline->description}}
                        </p>
                    </div>

                    <div class="tw-mb-2">
                        <p class="tw-text-gray-600 tw-font-semibold tw-text-md sm:tw-text-lg">
                            Horas semanais: 
                            <span class="tw-text-gray-900">
                                {{$timeline->minimum_week_hours}}
                            </span>
                        </p>
                    </div>

                    <div>
                        <div class="tw-text-md sm:tw-text-lg tw-text-gray-600 tw-font-semibold">
                            Dias da semana sem trabalho:
                            <div class="tw-inline-block tw-w-4 tw-h-4 tw-bg-blue-700 tw-rounded-[50%] tw-align-middle"></div>
                        </div>
                        <div class="tw-flex tw-justify-center tw-text-sm sm:tw-text-xl tw-font-semibold tw-mt-3 tw-select-none">
                            @foreach ($daysRatio as $dayRatio)
                                @if (strpos($timeline->standard_non_work_days, $dayRatio['day']) === false)
                                    <div class="tw-bg-white tw-text-gray-900 tw-py-1 tw-px-2 sm:tw-px-3 tw-border tw-border-gray-700">
                                        {{$dayRatio['acronymPT']}}
                                    </div>
                                @else
                                <div class="tw-bg-blue-700 tw-text-white tw-py-1 tw-px-2 sm:tw-px-3 tw-border tw-border-gray-700">
                                    {{$dayRatio['acronymPT']}}
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tw-flex tw-justify-center tw-gap-4 tw-mt-10">
                        <a href="{{route('admin.timelines.view', ['id' => $timeline->id])}}">
                            <svg data-slot="icon" class="tw-w-9 tw-bg-blue-700 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-blue-800" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                            </svg>
                        </a>
                        <a href="{{route('admin.timelines.edit', ['id' => $timeline->id])}}">
                            <svg data-slot="icon" class="tw-w-9 tw-bg-gray-600 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-gray-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                            </svg>
                        </a>
                        <a href="{{route('admin.timelines.delete', ['id' => $timeline->id])}}">
                            <svg data-slot="icon" class="tw-w-9 tw-bg-red-500 tw-text-white tw-p-1 tw-rounded-md hover:tw-bg-red-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection
