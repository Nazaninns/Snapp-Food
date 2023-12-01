@php
    $color=($comment->score>=3) ?'#fa983a': '#EA2027';
        $starSvg='<span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill='.$color. ' fill-opacity="0" stroke="'.$color.' " stroke-dasharray="32" stroke-dashoffset="32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3L9.65 8.76L3.44 9.22L8.2 13.24L6.71 19.28L12 16M12 3L14.35 8.76L20.56 9.22L15.8 13.24L17.29 19.28L12 16"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="32;0"/><animate fill="freeze" attributeName="fill-opacity" begin="0.5s" dur="0.5s" values="0;1"/></path></svg>
                </span>';
@endphp
<div class="category-card bg-gray-300">
    <p class="  text-lg text-blue-800">No Reply</p>
    <h2>Customer Name : <span class="text-indigo-700">{{$comment->user->name}}</span></h2>
    <p>Comment : <span class="text-indigo-700">{{$comment->text}}</span></p>
    <p class="flex gap-2"> Score :
        {!!str_repeat($starSvg,$comment->score)!!}

    </p>
    <p >Comment at : <span class="text-indigo-700">{{$comment->created_at}}</span></p>
    <p >Accepted at : <span class="text-indigo-700">{{$comment->updated_at}}</span></p>
    <div class="flex gap-16 ms-5 ">

    </div>


    <form action="{{route('comments.reply',$comment)}}" method="post">
        @csrf
        <!-- component -->
        <div class="flex gap-2 ">
                <input name="text"
                       class=" w-64 px-5 mt-3 py-3 rounded-lg border-t  border-b border-l text-gray-800 border-gray-200 bg-white"
                       placeholder="your answer"/>
                <button
                    class="p-3 text-gray-800 font-bold  uppercase ">

                    <svg class="mt-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15">
                        <path fill="currentColor"
                              d="M14.954.71a.5.5 0 0 1-.1.144L5.4 10.306l2.67 4.451a.5.5 0 0 0 .889-.06L14.954.71ZM4.694 9.6L.243 6.928a.5.5 0 0 1 .06-.889L14.293.045a.5.5 0 0 0-.146.101L4.694 9.6Z"/>
                    </svg>
                </button>

        </div>
    </form>
</div>

