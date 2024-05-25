<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="tw-bg-gray-100">

@if (session('message'))

    <div class="tw-flex tw-justify-end tw-w-full tw-absolute" 
    x-data="{show: false, closeButton: false}" 
    x-init="setTimeout(() => show = true, 1500); setTimeout(() => show = false, 4000)" 
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

    <h1 class="tw-text-center tw-py-2 tw-text-lg tw-flex tw-items-center tw-mx-auto tw-justify-center tw-font-semibold tw-text-gray-800 tw-cursor-default">
        <img src="../assets/icon-clock.svg" class="tw-w-10 tw-mr-2">
        Clock In Help
    </h1>

    <div class="tw-flex tw-min-h-[85vh] tw-justify-center tw-items-center tw-mx-10">

        <div class="tw-w-full tw-max-w-md tw-h-[500px] tw-bg-white tw-border tw-border-gray-300 tw-shadow-md tw-rounded-lg tw-px-3 tw-py-4">

            <div class="tw-py-5">
                <h1 class="tw-text-2xl tw-font-bold tw-text-center tw-text-gray-800 tw-block">Sign in to your acount</h1>
            </div>

            <hr class="tw-mb-5">

            <form action="{{route('auth.authenticate')}}" method="post" class="tw-flex tw-flex-col">
                @csrf

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="email" class="tw-text-gray-900 tw-mb-1">Email</label>
                    <input type="email" required name="email" id="email" class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700">
                </div>

                <div class="tw-flex tw-flex-col tw-px-7 tw-mb-4">
                    <label for="password" class="tw-text-gray-900 tw-mb-1">Password</label>
                    <div class="tw-flex tw-items-center tw-justify-end" x-data="{showPass: false}">
                        <input type="password" :type="showPass ? 'text' : 'password'" name="password" id="password" class="tw-border tw-rounded-md tw-pl-3 tw-pr-[35px] tw-py-2 tw-text-gray-900 tw-outline-none tw-w-full focus:tw-border-2 focus:tw-border-blue-700">
                        <svg x-show="!showPass" @click="showPass = !showPass" data-slot="icon" fill="none" stroke-width="2" class="tw-w-[28px] tw-mr-1 tw-cursor-pointer tw-text-gray-900 tw-rounded-[50%] tw-absolute" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                        </svg>
                        <svg x-show="showPass" @click="showPass = !showPass" data-slot="icon" fill="none" stroke-width="2" class="tw-w-[28px] tw-mr-1 tw-cursor-pointer tw-text-gray-900 tw-rounded-[50%] tw-absolute" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"></path>
                        </svg>
                    </div>
                </div>

                <input type="submit" value="Sign in" class="tw-w-28 tw-mx-auto tw-mt-4 tw-bg-blue-700 tw-text-xl tw-py-1 tw-cursor-pointer tw-font-semibold tw-rounded-3xl tw-text-white hover:tw-bg-blue-900">
            </form>

            <p class="tw-px-7 tw-text-center tw-mt-5 tw-text-md">
                Forgot password?
                <a href="#" class="tw-text-blue-700 tw-font-semibold tw-outline-none hover:tw-underline">
                    Click here
                </a>
            </p>

        </div>

    </div>
    
</body>
</html>