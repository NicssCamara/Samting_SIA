<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="./output.css" rel="stylesheet">
</head>
<body>
    <!-- Container -->
    <div class="min-h-screen bg-blue-50 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <!--Register Title-->
                        <h1 class="text-2xl h-15 font-bold text-blue-800">Register Account</h1>
                        <small class="top-20 h-15 pt-7 text-gray-400">Get started to connect with us!</small>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-sm sm:leading-7">
                            <form id="register-form" action="{{ route('register.save') }}" method="POST" class="space-y-4 md:space-y-6">
                                @csrf
                                <!--Username Textfield-->
                                <div class="relative">
                                    <label class="mb-2 block text-sm font-semibold text-blue-800">Full Name</label>
                                    <div class="relative">
                                        <input autocomplete="off" name="name" type="username" placeholder="Enter your name" id="username" class="block w-full rounded-full rounded-md border border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 py-1 px-9 text-gray-500" required/>
                                        @error('name')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                        <i class="px-2 absolute top-1/2 left-2 transform -translate-y-1/2 fas fa-user" style="color: slategray;"></i>
                                    </div>
                                </div>
                                <!--Email Textfield-->
                                <div class="relative">
                                    <label class="mb-2 block text-sm font-semibold text-blue-800">Email</label>
                                    <div class="relative">
                                        <input autocomplete="off" name="email" type="email" placeholder="Enter your email" id="email" class="block w-full rounded-full rounded-md border border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 py-1 px-9 text-gray-500" required/>
                                        @error('email')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                        <i class="px-2 absolute top-1/2 left-2 transform -translate-y-1/2 fas fa-envelope" style="color: slategray;"></i>
                                    </div>
                                </div>                
                                <!--Password Textfield-->
                                <div class="relative">
                                    <label class="mb-2 block text-sm font-semibold text-blue-800">Create Password</label>
                                    <div class="relative">
                                        <input autocomplete="off" name="password" type="password" placeholder="Create your password" id="password" class="block w-full rounded-full rounded-md border border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 py-1 px-9 text-gray-500" required/>
                                        @error('password')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                        <i class="px-2 absolute top-1/2 left-2 transform -translate-y-1/2 fas fa-lock" style="color: slategray;"></i>
                                    </div>
                                </div>
                                <!--Confirm Password Textfield-->
                                <div class="relative">
                                    <label class="mb-2 block text-sm font-semibold text-blue-800">Confirm Password</label>
                                    <div class="relative">
                                        <input autocomplete="off" name="password_confirmation" type="password" placeholder="Confirm your password" id="password_confirmation" class="block w-full rounded-full rounded-md border border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 py-1 px-9 text-gray-500" required/>
                                        @error('password_confirmation')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                        <i class="px-2 absolute top-1/2 left-2 transform -translate-y-1/2 fas fa-key" style="color: slategray;"></i>
                                    </div>
                                </div>
                                <!--Terms & Conditions-->
                                <div class="flex items-start">
                                    <div class="flex items-center h-8">
                                        <input id="terms" aria-describedby="terms" type="checkbox" class="mb-2 w-3 h-3 border border-blue-300 rounded bg-blue-50 focus:ring-3 focus:ring-blue-800 dark:bg-blue-500 dark:border-blue-500 dark:focus:ring-blue-600 dark:ring-offset-blue-800" required="">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="terms" class="text-xs font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-blue-500 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                                    </div>
                                </div>
                                <!--Register Button-->
                                <div class="relative ">
                                    <button class="text-base rounded-full mt-5 block w-full text-center font-semibold text-white bg-blue-500 hover:bg-blue-700 px-2 py-1.5 rounded-md">Register</button>
                                </div>
                                <!--Login-->
                                <div>
                                    <p class="text-xs text-center font-light text-gray-500 dark:text-gray-400">
                                    Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-500 hover:underline dark:text-primary-500">Login here</a>
                                </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
