<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>archive</title>
    @vite('resources/css/app.css')

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .header {
            background-color: #111827;
            color: #fff;
            display: flex;
            justify-content: space-between;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .food-form {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .food-form label {
            display: block;
            margin-top: 10px;
        }

        .food-form input, .food-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
        }

        .food-form button {
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input {
            color-scheme: dark;
        }
    </style>
</head>
<body style="background: #4b6cb7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #182848, #4b6cb7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #182848, #4b6cb7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
<nav class="header">
    <a style="margin-top: 20px" href="{{back()->getTargetUrl()}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 1024 1024">
            <path fill="white" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/>
            <path fill="white"
                  d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/>
        </svg>
    </a>
    <h1>Archive</h1>
    <div></div>
</nav>

<div class=" w-10/12  mx-auto">

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex gap-5 justify-between p-4 pl-1">
            <form action="{{route('admin.archive')}}">
                <input type="date" name="from"
                       class="text-gray-300 border p-3 ms-5 px-6   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 "
                >
                @error('from')
                {{$message}}
                @enderror
                <span class="icon text-gray-300 mx-3 text-lg">to</span>
                <input type="date" name="to"
                       class="text-white border p-3  px-6   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 "
                >
                @error('to')
                {{$message}}
                @enderror
                <button class=" p-3 text-gray-300" type="submit">Apply</button>
            </form>
            <span
                class="flex gap-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  ">
                <span>
                   <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path
                           fill="currentColor"
                           d="M14 13.1V12H4.6l.6-1.1l9.2-.9L16 4H3.7L3 1H0v1h2.2l2.1 8.4L3 13v1.5c0 .8.7 1.5 1.5 1.5S6 15.3 6 14.5S5.3 13 4.5 13H12v1.5c0 .8.7 1.5 1.5 1.5s1.5-.7 1.5-1.5c0-.7-.4-1.2-1-1.4z"/></svg>
                </span>
               : <span style="margin-top: 2px">  {{count($orders)}}</span></span>

            <span
                class=" flex gap-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500  ">
                @php $totalPrice=$orders->sum(function ($order){
     return $order->total_price - $order->discount;
 }) ;
                @endphp

                <span>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><path
                       fill="currentColor"
                       d="m210.6 44.39l-7-4.39c-13.7-8.4-30.8-13.28-45.5-8.7c-15.8 4.92-28.4 17.09-35 35.37l-9.4-4.84c-16.2-8.34-24.68-8.47-31.71-5.31c-5.61 2.51-11.46 8.55-18.09 17.37l82.4 63.71c12.9 4.2 31.8 4.1 50.7-.8c19-4.9 37.9-14.5 51.7-27.4l31.1-76.9c-27.4-21.65-52.4-9.11-69.2 11.89zm53.1 76.51c-17 17.2-42.3 28.8-62 34c-6.9 1.8-13.8 3.1-20.5 3.8c-3.7 6.1-6.8 12.3-9.2 18.5c4.8 24.4 13.8 44.4 27.3 60.8l-14.4 12c-8.3-10-15.7-20.8-21.3-32.8c-.9 23.2 4.3 47.2 12.8 72.2l-17.7 6c-15.6-45.6-20.9-92.3 1-136.3c-7.4-.6-14.4-2-20.9-4.3l-.3-.1c-4.3 4.1-8.4 8.4-12.3 12.9c-31.57 36.6-48.96 85.3-39.86 123.2c4.87 20.3 13.6 39.5 26.16 55.9c18.4-.4 35.8 0 51.6 6c7.5-.8 15.2-1.3 23.2-1.3c28.5 0 54.3 5.3 73.8 14.5c7.6 3.6 14.5 7.9 20 12.8c0-5.3.8-11 2.4-15.2c-8.9-8.4-14.5-18.6-14.5-30.2c0-16.1 10.7-29.4 26.2-39c0-4.6.9-9 2.5-13.2c-10.1-8.7-16.6-19.5-16.6-32.1c0-7.9 2.6-15.1 7-21.6c-4.4-6.4-7-13.6-7-21.5c0-3.9.6-7.5 1.7-11c-9.7-8.6-15.8-19.2-15.8-31.4c0-12.1 6-22.6 15.6-31.1c-5.9-4.6-12.2-8.5-18.9-11.5zm111.4 2.3c-26 0-49.5 5.5-65.6 13.6c-16.2 8.1-23.8 18.1-23.8 26.7c0 8.7 7.6 18.7 23.8 26.8c16.1 8.1 39.6 13.6 65.6 13.6c11.3 0 22-1.1 31.9-2.9v-17c13.9-2.1 25.4-5.9 32.8-10.8v17.6c12.5-3.6 24.5-16.9 24.8-27.3c0-8.6-7.6-18.6-23.8-26.7c-16.2-8.1-39.6-13.6-65.7-13.6zm96.5 67.7c-3.3 3.5-7.2 6.8-11.6 9.8l.2 29c12.6-7.5 18.5-16.2 18.5-23.8c0-4.8-2.3-10-7.1-15zm-171.8 15.4c.3 8.6 7.9 18.3 23.8 26.3c16.2 8.2 39.6 13.6 65.7 13.6c16.3 0 31.6-2.2 44.7-5.8l.7-27.2c-17.2 6-37.6 9.3-59.6 9.3c-28.5 0-54.4-5.7-74-15.5c-.5-.2-.9-.5-1.3-.7zm2 34.8c-1.4 2.7-2 5.4-2 7.9c0 8.7 7.6 18.7 23.8 26.8c16.2 8.1 39.6 13.5 65.7 13.5c13.2 0 25.7-1.3 37-3.8v-24c-11.6 2.2-24 3.3-37 3.3c-28.6 0-54.5-5.6-74.1-15.5c-4.9-2.4-9.4-5.2-13.4-8.2zm174.9 0c-6.1 4.3-11.4 7.5-17.6 10.2v22.3c13.3-7.7 19.6-16.7 19.6-24.6c0-2.5-.6-5.2-2-7.9zm7.5 36.8c-2 2-4.2 3.9-6.6 5.8v32.4c10.3-7 15.3-14.7 15.3-21.7c0-5.3-2.9-11-8.7-16.5zm-170.1 14c-.1.9-.2 1.7-.2 2.5c0 8.7 7.6 18.6 23.8 26.7c16.2 8.2 39.7 13.6 65.7 13.6c14.9 0 29.1-1.8 41.4-4.8V300c-16.3 5.2-35.2 8-55.5 8c-28.6 0-54.5-5.7-74.1-15.5c-.4-.2-.7-.4-1.1-.6zm-13.6 21.4c-8.7 6.5-12.8 13.6-12.8 20c0 8.7 7.6 18.6 23.8 26.8c16.2 8.1 39.6 13.5 65.7 13.5c9.5 0 18.7-.7 27.3-2v-18.2h-1.1c-28.6 0-54.5-5.7-74.1-15.6c-12.5-6.2-22.9-14.5-28.8-24.5zM463 343.9c-7.9 2.8-16.5 5.1-25.7 6.6v12.1c1.9-.8 3.8-1.6 5.6-2.5c9.8-5 16.4-10.6 20.1-16.2zm9.2 18.2c-3.8 3.8-8.2 7.2-13.1 10.3V401c13.3-7.6 19.6-16.6 19.6-24.5c0-4.6-2.1-9.6-6.5-14.4zm-348.7 2.8c-10.2.1-21.2 1.4-32.6 4.1c-22.81 5.3-42.42 15-55.22 25.7c-12.8 10.6-17.8 21.4-16.3 29.1c1.5 7.7 9.4 14.8 24.8 18.9c15.35 4 36.82 4.2 59.62-1.1c9.2-2.2 17.8-5 25.7-8.3v-20.7c14.6-6.5 25.5-14.3 30.4-21.9v24.4c12.1-10.4 16.8-20.8 15.4-28.4c-1.4-7.7-9.4-14.8-24.8-18.8c-7.7-2-16.9-3.1-27-3zm64.6 5.2c2.7 3.9 4.6 8.3 5.6 13.2c1.1 6 .6 11.8-1.2 17.5c9.9 2.6 18.9 6.1 26.7 10.5c4.4 2.4 8.5 5.3 12.1 8.3c9-2.1 16.6-5.1 22-8.7v20.6c16.1-7.6 23.5-16.9 23.5-24.3c0-7.5-7.4-16.8-23.6-24.4c-16.1-7.5-39.3-12.6-65.1-12.7zm111.8 5c-.1.4-.1.9-.1 1.4c0 8.7 7.6 18.6 23.8 26.8c16.2 8.1 39.6 13.5 65.7 13.5c13.2 0 25.7-1.4 37-3.8v-26.9c-14.8 4-31.5 6.2-49.1 6.2c-28.6 0-54.5-5.7-74.1-15.5c-1.1-.6-2.2-1.2-3.2-1.7zm2.8 37.3c-2 3.3-2.9 6.5-2.9 9.6c0 8.7 7.6 18.6 23.8 26.8c16.2 8.1 39.6 13.5 65.7 13.5c13.2 0 25.7-1.4 37-3.8v-26.4c-11.6 2.2-24 3.4-37 3.4c-28.6 0-54.5-5.7-74.1-15.6c-4.5-2.2-8.7-4.7-12.5-7.5zm173.1 0c-5.8 3.9-10.9 7-16.7 9.5v24.6c13.3-7.6 19.6-16.6 19.6-24.5c0-3.1-.9-6.3-2.9-9.6zm-292.6 5.4c-3.5 4.4-7.6 8.6-12.2 12.4c-15.6 13.1-37.6 23.7-63 29.6c-9.06 2.1-18.06 3.4-26.7 4.1c3.2 5.3 8.83 10.5 17.07 15.1c13.63 7.7 33.63 12.9 55.83 12.9c10.1 0 19.7-1.1 28.5-3v-20.8c13.8-2.1 25.4-5.9 32.8-10.8v18.4c10-7 14.8-14.9 14.8-22.4c0-8.7-6.5-18-20.2-25.7c-7.4-4.1-16.6-7.5-26.9-9.8z"/></svg>
                </span>
                  :  <span style="margin-top: 2px">      {{$totalPrice}} $ </span></span>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="pr-16  pl-8 py-3">
                    number
                </th>
                <th scope="col" class="px-6 py-3">
                    restaurant name
                </th>
                <th scope="col" class="px-6 py-3">
                    order id
                </th>
                <th scope="col" class="px-6 py-3">
                    customer name
                </th>
                <th scope="col" class="px-6 py-3">
                    date
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="">show</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class=" w-4 pl-10">

                        #{{$order->id}}
                    </td>
                    <td class="  pl-7 ">

                        {{$order->restaurant->name}}
                    </td>
                    <td class="pl-7 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$order->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$order->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$order->pay}}
                    </td>
                    <td class="px-6 py-4">
                        {{$order->total_price - $order->discount}} $
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('admin.archive.show',$order)}}" class="btn-grad">
                            show
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

