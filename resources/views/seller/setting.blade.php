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
                    <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Update info</h2>


                </div>

                <div class="mt-8">
                    <form action="{{route('seller.updateSetting',$restaurant)}}" method="post">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Name</label>
                            <input type="text" name="name" id="name" value="{{$restaurant->name}}"  class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('name')
                        {{$message}}
                        @enderror
                        <div>
                            <label  class="block mb-1 mt-2 text-sm text-gray-600 dark:text-gray-200">Type</label>
                            <div class="mb-2">
                                @foreach($restaurantCategories as $category)
                                <label for="fast_food" class=" mb-2 text-sm text-gray-600 dark:text-gray-200">{{$category->name}}</label>
                                <input type="checkbox" name="type[]" id="fast_food" value="{{$category->id}}"  class=" ms-1 px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                @endforeach
                            </div>
                            @error('type')
                            {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">phone</label>
                            <input type="text" name="phone" id="phone" value="{{$restaurant->phone}}" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('phone')
                        {{$message}}
                        @enderror
                        <div>
                            <label for="address" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Address</label>
                            <input type="text" name="address" id="phone" value="{{$restaurant->address}}" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('address')
                        {{$message}}
                        @enderror
                        <div>
                            <label for="account" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Account Number</label>
                            <input type="text" name="account_number" id="account" value="{{$restaurant->account_number}}" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('account_number')
                        {{$message}}
                        @enderror
                        {{-- <div>
                            <label for="start" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Start Time</label>
                            <input type="text" name="start_time" id="start" value="{{$restaurant?->start_time}}" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('shipping_cost')
                        {{$message}}
                        @enderror --}}
                        {{-- <div>
                            <label for="end" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">End Time</label>
                            <input type="text" name="end_time" id="end" value="{{$restaurant?->end_time}}" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('shipping_cost')
                        {{$message}}
                        @enderror --}}
                        {{-- <div>
                            <label for="shipping" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Shipping Cost</label>
                            <input type="numeric" name="shipping_cost" id="shipping" value="{{$restaurant?->shipping_cost}}" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        @error('shipping_cost')
                        {{$message}}
                        @enderror --}}
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


