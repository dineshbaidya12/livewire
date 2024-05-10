<div>
    <h5>Create a new Post</h5>
    <form wire:submit.prevent="post" enctype="multipart/form-data">
        <input type="file" class="form-control" wire:model.blur="form_file" id="form_file">
        @error('form_file') <span class="text-danger">{{ $message }}</span> @enderror
        <textarea class="form-control mt-1" style="resize:none; font-size:14px;" placeholder="Write Your Thoughts." wire:model.blur="post_caption"></textarea>
        @error('post_caption') <span class="text-danger" style="display:block;">{{ $message }}</span> @enderror
        <button class="btn btn-success mt-2">Post</button>
    </form>
</div>
