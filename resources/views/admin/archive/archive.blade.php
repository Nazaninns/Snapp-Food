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
            <form action="{{route('admin.archive')}}" >
                <input type="date" name="from">
                @error('from')
                {{$message}}
                @enderror
                <input type="date" name="to">
                @error('to')
                {{$message}}
                @enderror
                <button type="submit">sub</button>
            </form>
            <span
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  ">
                count : {{count($carts)}}</span>
            <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  ">
                @php $totalPrice=$carts->sum(function ($cart){
     return $cart->totalPriceAfterDiscount();
 }) ;
                @endphp
                income : {{$totalPrice}} $</span>
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
                    cart id
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
            @foreach($carts as $cart)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class=" w-4 pl-10">

                        #{{$cart->id}}
                    </td>
                    <td class="  pl-7 ">

                        {{$cart->restaurant->name}}
                    </td>
                    <td class="pl-7 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$cart->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cart->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cart->pay}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cart->totalPriceAfterDiscount()}} $
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('archive.show',$cart)}}" class="btn-grad">
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
