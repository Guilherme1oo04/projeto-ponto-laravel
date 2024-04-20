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


            @if (session('message'))
                <p id="session-message" class="tw-text-center tw-mt-7 tw-mx-7 tw-py-3 tw-rounded-md tw-text-xl tw-bg-red-500 tw-text-white tw-font-semibold">{{ session('message') }}</p>

                <script>
                    const messageParagraph = document.getElementById('session-message');

                    setTimeout(() => {
                        messageParagraph.style.display = 'none';
                    }, 4000);
                </script>
            @endif
            
        </div>

    </div>
    
</body>
</html>