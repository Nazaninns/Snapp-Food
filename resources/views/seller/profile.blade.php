{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<form action="{{route('register.submit')}}" method="post">--}}
{{--@csrf--}}

{{--    <input type="text" placeholder="name" name="name">--}}
{{--    @error('name')--}}
{{--    {{$message}}--}}
{{--    @enderror--}}
{{--    <input type="text" placeholder="email" name="email">--}}
{{--    @error('email')--}}
{{--    {{$message}}--}}
{{--    @enderror--}}
{{--    <input type="text" placeholder="phone" name="phone">--}}
{{--    @error('phone')--}}
{{--    {{$message}}--}}
{{--    @enderror--}}
{{--    <input type="text" placeholder="password" name="password">--}}
{{--    @error('password')--}}
{{--    {{$message}}--}}
{{--    @enderror--}}
{{--    <button type="submit">register</button>--}}

{{--</form>--}}
{{--</body>--}}
{{--</html>--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    @vite('resources/css/app.css')
</head>
<body >
<div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Profile</h2>

                    <p class="mt-3 text-gray-500 dark:text-gray-300">please complete your profile</p>
                </div>

                <div class="mt-8">
                    <form action="{{route('seller.storeProfile')}}" method="post">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Name</label>
                            <input type="text" name="name" id="name" placeholder="enter your restaurant name" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('name')
                        {{$message}}
                        @enderror
                        <div>
                            <label  class="block mb-1 mt-2 text-sm text-gray-600 dark:text-gray-200">Type</label>
                            <div class="mb-2">
                                <label for="fast_food" class=" mb-2 text-sm text-gray-600 dark:text-gray-200">fast food</label>
                                <input type="checkbox" name="type" id="fast_food"  class=" ms-1 px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                <label for="sea_food" class=" mb-2 text-sm text-gray-600 dark:text-gray-200">sea food</label>
                                <input type="checkbox" name="type" id="sea_food"  class=" ms-1 px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                <label for="persian" class=" mb-2 text-sm text-gray-600 dark:text-gray-200">fastfood</label>
                                <input type="checkbox" name="type" id="persian"  class=" ms-1 px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                <label for="salad" class=" mb-2 text-sm text-gray-600 dark:text-gray-200">salad</label>
                                <input type="checkbox" name="type" id="salad"  class=" ms-1 px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                <label for="international" class=" mb-2 text-sm text-gray-600 dark:text-gray-200">international</label>
                                <input type="checkbox" name="type" id="international" placeholder="enter your restaurant type" class=" ms-1 px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />

                            </div>
                             </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">phone</label>
                            <input type="text" name="phone" id="phone" placeholder="enter your phone number" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('phone')
                        {{$message}}
                        @enderror
                        <div>
                            <label for="address" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Address</label>
                            <input type="text" name="address" id="phone" placeholder="enter your address" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('address')
                        {{$message}}
                        @enderror
                        <div>
                            <label for="account" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Account Number</label>
                            <input type="text" name="account_number" id="account" placeholder="enter your account number" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('account_number')
                        {{$message}}
                        @enderror
                        <div class="mt-6">
                            <button type="submit"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Save
                            </button>
                        </div>

                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">already have an account ? <a href="{{route('login.submit')}}" class="text-blue-500 focus:outline-none focus:underline hover:underline">Login</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

