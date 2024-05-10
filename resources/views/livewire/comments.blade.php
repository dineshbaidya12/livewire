<div>
    @if (count($comments) > 0)
    <ul>
        @foreach ($comments as $cmnt)
            <li>{{$cmnt->comment}}</li>
        @endforeach
    </ul>
    @else
        <p>No Comments yet</p>
    @endif
    
</div>
