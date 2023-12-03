@php

  @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3"
             style="background-image: url({{asset('restaurant-interior.jpg')}})">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">

                <div>
                    <h2 class="text-4xl font-bold text-white">Snapp Food</h2>

                    <p class="max-w-xl mt-3 text-gray-300">Snapp Food is first online food website </p>
                </div>
            </div>
        </div>

        <div class="flex mb-40  items-center w-full max-w-md  px-6 mx-auto lg:w-2/6">

            <div class="flex-1">
                <div class="w-60 mb-12 mt-5   h-60 flex flex-col mx-auto">
                    <div class="text-white text-xl mb-2">{{$banner?->message}}</div>
                    <img class="w-60 h-60"  src="{{asset('storage/'.$banner?->image)}}" >
                </div>
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Snapp Food</h2>

                    <p class="mt-3 text-gray-500 dark:text-gray-300">Login to access your account</p>
                </div>

                <div class="mt-8">
                    <form action="{{route('login.submit')}}" method="post">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email
                                Address</label>
                            <input type="email" name="email" id="email" placeholder="example@example.com"
                                   class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"/>
                            <div class="text-red-600">
                            @error('email')
                            {{$message}}
                            @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                                <a href="#"
                                   class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot
                                    password?</a>
                            </div>

                            <input type="password" name="password" id="password" placeholder="Your Password"
                                   class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"/>
                            <div class="text-red-600">
                            @error('password')
                            {{$message}}
                            @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Login
                            </button>
                        </div>

                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a
                            href="{{route('register.submit')}}"
                            class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
