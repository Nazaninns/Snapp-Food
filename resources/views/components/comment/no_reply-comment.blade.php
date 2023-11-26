<div class="category-card bg-gray-300">
    <p style="color: #3498db">no reply</p>
    <h2>{{$comment->user->name}}</h2>
    <p>comment:{{$comment->text}}</p>
    <p>score:{{$comment->score}} star</p>
    <form action="{{route('comments.reply',$comment)}}" method="post">
        @csrf
        <input type="text" name="text" placeholder="text">
        <button type="submit">submit</button>
    </form>
</div>

