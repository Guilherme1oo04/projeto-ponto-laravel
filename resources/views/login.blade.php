<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="tw-bg-white">

    <div class="tw-flex tw-min-h-[100vh] tw-justify-around tw-flex-col tw-items-center tw-mx-10">

        <h1 class="tw-text-3xl tw-font-bold tw-text-center tw-text-slate-900">Sign in to your acount</h1>

        <div class="tw-w-full tw-max-w-sm tw-h-96">
            <form action="{{route('auth.authenticate')}}" method="post" class="tw-flex tw-flex-col">
                @csrf

                <div class="tw-mb-6">
                    <label for="email" class="tw-text-md tw-font-medium tw-text-slate-900 tw-block tw-mb-2">Email address</label>
                    <input type="email" required name="email" id="email" class="tw-w-full tw-bg-transparent tw-border tw-border-solid tw-border-slate-300 tw-rounded-md tw-h-9 tw-p-3 tw-text-lg tw-font-normal tw-cursor-text tw-outline-none focus:tw-border-slate-700 focus:tw-border-2">
                </div>

                <div>
                    <div class="tw-flex tw-justify-between tw-mb-2">
                        <label for="password" class="tw-text-md tw-font-medium tw-text-slate-900">Password</label>
                        <a href="#" class="tw-text-md tw-font-medium tw-text-slate-500 hover:tw-text-slate-700 hover:tw-underline">Forgot password?</a>
                    </div>
                    <input type="password" required name="password" id="password" class="tw-w-full tw-bg-transparent tw-border tw-border-solid tw-border-slate-300 tw-rounded-md tw-h-9 tw-p-3 tw-text-lg tw-font-normal tw-cursor-text tw-outline-none focus:tw-border-slate-700 focus:tw-border-2">
                </div>

                <input type="submit" value="Sign in" class="tw-w-28 tw-mx-auto tw-mt-5 tw-bg-slate-700 tw-text-xl tw-py-1 tw-cursor-pointer tw-font-semibold tw-rounded-3xl tw-text-white hover:tw-bg-slate-800">
            </form>


            @if (session('message'))
                <p class="tw-text-center tw-mt-5 tw-text-xl tw-text-red-500 tw-font-semibold">{{ session('message') }}</p>
            @endif
            
        </div>

    </div>
    
</body>
</html>