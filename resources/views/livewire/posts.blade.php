<div>
    <style>
        .comments{
            height: auto;
            width: 100%;
            /* background: #747cff; */
            background: white;
            z-index: 999;
            /* display: none; */
            border-radius: 0px 20px 20px 20px;
            padding: 10px;
            margin: 5px;
            overflow: auto;
        }

        .comments.show{
            display: block;
        }
    </style>
    <h4>All Posts ({{$all_posts}})
        {{-- <button wire:click="custom">CUs</button> --}}
    </h4>
    <div class="container">
        @foreach ($post as  $post)
            <div class="post position-relative">
                <h5 class="mt-1" style="color: #645000;">POST - {{ str_pad($post->id, 3, '0', STR_PAD_LEFT) }} 
                    <button wire:click="deletePostConfirmation('{{$post->id}}')" class="btn btn-danger show-cmnt-btn">Delete</button>
                </h5>
                <p class="m-0 mb-1" style="font-size:14px;">{{$post->caption}}</p>
                <div class="img-div position-relative" style="width: 350px;{{$post->file == "" ? "" : "height: 255px;"}}">
                    @if ( $post->file != "")
                        <img style="object-fit:contain; height:100%; width:100%;" src="{{asset('uploads/posts/'.$post->file)}}" alt="POST - 01">
                    @endif
                </div>
                
                {{-- <button data-postid="{{$post->id}}" class="btn btn-grey show-cmnt-btn">Comments</button> --}}

                <div class="comments" id="comment_{{$post->id}}">
                    <p>All Comments({{count($post->comments)}})</p>
                    @if ($post->comments != null)
                        @if (count($post->comments) > 0)
                        <ul>
                            @foreach ($post->comments as $cmnt)
                                <li>{{$cmnt->comment}} <button wire:click="deleteCommentConfirmation('{{$cmnt->id}}')" class="btn btn-danger" style="font-size: 9px; padding: 4px 8px;"><i class="fa fa-trash" aria-hidden="true"></i>
                                </button></li>
                            @endforeach
                        </ul>
                        @else
                            <p>No Comments yet</p>
                        @endif
                    @else
                        <p>No Comments yet</p>
                    @endif
                </div>
                <div class="d-flex mb-5">
                    <input type="text" placeholder="Enter Comment" class="form-control" wire:model="newComments.{{ $post->id }}">
                    <button wire:click="addComment('{{ $post->id }}')" class="btn btn-success">Comment</button>
                </div>
            </div>
        @endforeach
    </div>


</div>
