<div class="category-card bg-gray-300">
    <p style="color: #3498db">replied</p>
    <h2>{{$comment->user->name}}</h2>
    <p>comment:{{$comment->text}}</p>
    <p>score:{{$comment->score}} star</p>
    <p>answer: {{$comment->reply?->text}}</p>
</div>
