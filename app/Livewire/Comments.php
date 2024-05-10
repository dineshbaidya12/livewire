<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public function render()
    {
        return view('livewire.comments');
    }

    public function mount($postId=null){
        if($postId == null){
            return;
        }
        $this->comments = Comment::where('post_id', $postId)->orderBy('date', 'DESC')->get();
    }

    
}
