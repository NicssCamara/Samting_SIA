<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="./output.css" rel="stylesheet">
</head>
<body>
    <form id="login-form" action="{{ route('login.action') }}" method="POST" class="min-h-screen bg-blue-50 py-6 flex flex-col justify-center sm:py-12">
        @csrf <!-- CSRF token -->
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl h-15 font-bold text-blue-800">Login</h1>
                        <small class="top-20 h-15 pt-7 text-gray-400">Welcome back! Please enter your details</small>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-sm sm:leading-7">
                            <!--Error Messages-->
                            @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Error!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li><span class="block sm:inline">{{ $error }}</span></li>
                                    @endforeach
                                </ul>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                            @endif
                            <!--Email Textfield-->
                            <div class="relative">
                                <label class="mb-2 block text-sm font-semibold text-blue-800">Email</label>
                                <div class="relative">
                                    <input autocomplete="off" name="email" type="email" placeholder="Enter your email" id="email" class="block w-full rounded-full rounded-md border border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 py-1 px-9 text-gray-500"/>
                                    <i class="px-2 absolute top-1/2 left-2 transform -translate-y-1/2 fas fa-envelope" style="color: slategray;"></i>
                                </div>
                            </div>

                            <!--Password Textfield-->
                            <div class="relative">
                                <label class="mb-2 block text-sm font-semibold text-blue-800">Password</label>
                                <div class="relative">
                                    <input autocomplete="off" name="password" type="password" placeholder="Enter your password" id="password" class="block w-full rounded-full rounded-md border border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 py-1 px-9 text-gray-500"/>
                                    <i class="px-2 absolute top-1/2 left-2 transform -translate-y-1/2 fas fa-lock" style="color: slategray;"></i>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                            <!--Remember me checkbox-->
                            <div class="flex items-start">
                                <div class="flex items-center h-5 ">
                                    <input name="remember" id="remember" aria-describedby="remember" type="checkbox" class="w-3 h-3 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-2 text-xs">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300 font-semibold">Remember me</label>
                                </div>
                            </div>

                            <!--Forgot Password-->
                            <div class="text-right">
                                <a href="#" class="mb-2 block text-xs font-semibold text-blue-500 hover:text-blue-800 cursor-pointer">Forgot Password?</a>
                            </div>
                            </div>
                            <!--Submit Button-->
                            <div class="relative">
                                <form action="{{ route('home') }}" method="GET">
                                    <button type="submit" class="text-base rounded-full mt-10 block w-full text-center font-semibold text-white bg-blue-500 hover:bg-blue-700 px-2 py-1.5 rounded-md">Log In</button>
                                </form>
                            </div>
                            <!--Forgot Password-->
                            <div>
                                <p class="mt-8 text-xs text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
