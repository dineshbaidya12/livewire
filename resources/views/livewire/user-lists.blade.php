<div>
    <p class="alert alert-warning" wire:offline>
        Whoops, your device has lost connection. The web page you are viewing is offline.
    </p>
    <table border="1px">
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)
                @foreach ($users as $user)
                <tr wire:key="{{ $user->id }}">
                    <td>
                        {{ $user->first_name }}
                    </td>
                    <td>
                        {{ $user->last_name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <button wire:click="edit_modal({{ $user->id }})">Edit</button>
                    </td>
                    <td>
                        {{-- <button type="button" wire:click="$refresh">Delete</button> --}}
                        <button type="button" wire:click="deleteWithSweetAlert({{$user->id}})">Delete</button>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <button wire:click="addNewStudent">Add</button>

    <a href="{{route('testing')}}" wire:navigate>Routing Testing</a>
    
    @if($showModal)
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="$set('showModal', false)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save" method="POST" id="student_form">
                        <div class="form-group">
                            <label for="name">First Name:</label>
                            <input type="text" class="form-control" id="name" wire:model="firstname">
                            @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" wire:model="lastname">
                            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="$set('showModal', false)">Close</button>
                    <button type="buttton" class="btn btn-primary" id="submit_btn">{{$hey}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif


</div>
<script type="text/javascript">
    
</script>
<!-- JavaScript to listen for the confirmDelete event -->
<script>
    window.addEventListener('livewire:initialized', () =>{

        @this.on('create_new_student', (event) => {
            Swal.fire({
                title: event[0].title,
                text: event[0].text,
                icon: event[0].icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.dispatch('yesAdd');
                }
            });
        });

        @this.on('confirmDelete', (event) => {
            Swal.fire({
                title: event[0].title,
                text: event[0].text,
                icon: event[0].icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.dispatch('yesDelete');
                }
            });
        });


    });
    
</script>