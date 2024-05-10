<?php

namespace App\Livewire;

use App\Models\Attendence;
use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class Posts extends Component
{
    public $allPosts;
    public $allComments;
    public $deletePostId = 0;
    public $deleteCmntId = 0;
    public $newComments = [];

    public function mount()
    {
        $this->allPosts = Post::orderBy('date', 'DESC')->get();
        $this->allComments = collect(Comment::get()->groupBy('post_id'));
        foreach ($this->allPosts as $post) {
            $post->comments = $this->allComments->get($post->id, []);
        }
    }

    public function render()
    {
        return view('livewire.posts', [
            'post' => $this->allPosts,
            'all_posts' => count($this->allPosts)
        ]);
    }

    #[On('updateNotificationPost')]
    public function uuuuppppdatePost($redirect = false)
    {
        if($redirect ){
            Session::put('success_msg', $this->studentId == null ? 'Student added successfully.' : 'Student modifed successfully.');
            $this->redirect(route('posts'), true);
        }else{
            $this->mount();
        }
    }

    public function postComment($postId, $comment){
        $cmnt = new Comment();
        $cmnt->post_id = $postId;
        $cmnt->comment = $comment;
        $cmnt->date = Carbon::now();
        $cmnt->save();
        $this->dispatch('alert', ['title' => 'Comment Done', 'message' => '', 'icon' => 'success']);
        return;
    }

    public function deletePostConfirmation($postId){
        $this->deletePostId = $postId;$this->uuuuppppdatePost();
        $this->dispatch('delete-alert', ['title' => 'Are you Sure You Want to Delete That Post?', 'message' => 'This action cant be undone', 'icon' => 'warning', 'confirmFunction' => 'postDeleteConfirm']);
        return;
    }

    #[On('postDeleteConfirm')]
    public function deletePOst(){
        Post::where('id', $this->deletePostId)->delete();
        $this->uuuuppppdatePost();
        $this->dispatch('alert', ['title' => 'Done', 'message' => 'Post Deleted Successfully.', 'icon' => 'success']);
        return;
    }

    public function deleteCommentConfirmation($cmntId){
        $this->deleteCmntId = $cmntId;
        $this->uuuuppppdatePost();
        $this->dispatch('delete-alert', ['title' => 'Are you Sure You Want to Delete That Post?', 'message' => 'This action cant be undone', 'icon' => 'warning', 'confirmFunction' => 'commentDeleteConfirm']);
        return;
    }

    #[On('commentDeleteConfirm')]
    public function deleteComment(){
        Comment::where('id', $this->deleteCmntId)->delete();
        $this->uuuuppppdatePost();
        $this->dispatch('alert', ['title' => 'Done', 'message' => 'Comment Deleted Successfully.', 'icon' => 'success']);
        return;
    }

    public function addComment($postId)
    {
        $commentText = $this->newComments[$postId];
        $cmnt = new Comment();
        $cmnt->post_id = $postId;
        $cmnt->comment = $commentText;
        $cmnt->date = Carbon::now();
        $cmnt->user_id = 34;
        $cmnt->save();
        $this->reset('newComments');  
        $this->uuuuppppdatePost(); 
    }

    public function custom(){
        // $this->js('
        //     $wire.$refresh();
        // ');
        // $this->post[count($this->post)] = Post::where('id', 128)->first();
        // $this->post[count($this->post)]->comments = Comment::where('post_id', $this->post[count($this->post)]->id)->get();
        $this->uuuuppppdatePost(); 
    }
}
