@extends('layouts.superAdmin')

@section('title', 'Admin Home')

@section('content')

    <main class="tw-max-w-md tw-w-[100vw] tw-h-[70vh] tw-mt-12 tw-mx-auto">

        <div class="tw-mx-2 tw-py-4 tw-px-3 tw-bg-white tw-border tw-rounded-2xl tw-shadow-sm">
            <div class="tw-py-5">
                <h1 class="tw-text-gray-800 tw-font-bold tw-text-2xl tw-block tw-text-center">
                    Register employee
                </h1>
                <p class="tw-text-gray-500 tw-text-center tw-mt-3">
                    Write employee information to complete registration
                </p>
            </div>
            
            <hr class="tw-mb-5">

            <form action="{{route('admin.employees.processAdition')}}" method="POST">

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="name" class="tw-text-gray-900 tw-mb-1">Name</label>
                    <input type="text" name="name" id="name" class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-500">
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="email" class="tw-text-gray-900 tw-mb-1">Email</label>
                    <input type="email" name="email" id="email" class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-500">
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="cpf" class="tw-text-gray-900 tw-mb-1">CPF</label>
                    <input type="text" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="cpf" id="cpf" class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-500">
                </div>

            </form>
            
        </div>

    </main>

@endsection