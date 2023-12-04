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
    <h1 class="text-2xl mt-3">Set Time</h1>
    <div></div>
</nav>
<div class="mt-5 w-11/12 mx-auto">
    <table class="w-full bg-gray-700 text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach($times as $time)
                <td class="px-6 py-3">{{$time->day}}</td>
            @endforeach
        </tr>
        </thead>
        <tbody>
        <!-- Add dynamic data here if available -->
        <tr>
            @foreach($times as $time)
                <td class="px-6 py-3">
                    <div class="flex flex-col">
                        <form class="" action="{{route('time.update',$time)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <label for="">start</label>
                            <input type="time" value="{{$time->start_time}}" name="start_time" class="w-24">
                            @error('start_time')
                            {{$message}}
                            @enderror
                            <label for="">end</label>
                            <input type="time" value="{{$time->end_time}}" name="end_time" class="w-24">
                            <div>
                                <button type="submit">accept</button>
                            </div>
                        </form>
                        <form action="{{route('time.close',$time)}}" method="post">
                            @csrf
                            @method('PATCH')

                            <button type="submit">close</button>

                        </form>

                    </div>
                </td>
            @endforeach
        </tr>

        </tbody>
    </table>
</div>
<div class="mt-5 w-11/12 mx-auto">
    <table class="w-full bg-gray-700 text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>

            <td class="px-6 py-3">saturday_wednesday</td>
            <td class="px-6 py-3">all_days</td>

        </tr>
        </thead>
        <tbody>
        <!-- Add dynamic data here if available -->
        <tr>
            <td class="px-6 py-3">
                <div class="flex flex-col">
                    <form class="" action="{{route('time.someDay')}}" method="post">
                        @csrf
                        <input type="time" name="start_time" class="w-24">
                        @error('start_time')
                        {{$message}}
                        @enderror
                        <input type="time" name="end_time" class="w-24">
                        <div>
                            <button type="submit">accept</button>
                        </div>
                    </form>
                    <form action="{{route('time.someDay.close')}}" method="post">
                        @csrf
                        <button type="submit">close</button>
                    </form>
                </div>
            </td>


            <td class="px-6 py-3">
                <div class="flex flex-col">
                    <form class="" action="{{route('time.allDay')}}" method="post">
                        @csrf
                        <input type="time" name="start_time" class="w-24">
                        @error('start_time')
                        {{$message}}
                        @enderror
                        <input type="time" name="end_time" class="w-24">
                        <div>
                            <button type="submit">accept</button>
                        </div>
                    </form>
                    <form action="{{route('time.allDay.close')}}" method="post">
                        @csrf
                        <button type="submit">close</button>
                    </form>
                </div>
            </td>

        </tr>

        </tbody>
    </table>
</div>
</body>
</html>

