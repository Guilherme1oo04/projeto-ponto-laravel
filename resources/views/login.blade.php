<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
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
                    <input type="password" name="password" id="password" class="tw-border tw-rounded-md tw-px-3 tw-py-2 tw-text-gray-900 tw-outline-none focus:tw-border-2 focus:tw-border-blue-700">
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