<div>
    <h3 style="text-align: center;">All Student Lists</h3>
    <div class="m-3">
        <a href="{{route('addNewStudent')}}" class="btn btn-success" wire:navigate>Add New Student</a>
        <input type="text" wire:model.live="student_name" placeholder="Search student">
        <select wire:model.live="class" id="searchterm_class">
            <option value="">--</option>
            <option value="5">Class 5</option>
            <option value="6">Class 6</option>
            <option value="7">Class 7</option>
            <option value="8">Class 8</option>
        </select>
    </div>
    <table class="table table-striped">
        @if (count($theStudents) > 0)
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($theStudents as $user)
                <tr>
                    <td width="15%">{{ $user->first_name }}</td>
                    <td width="15%">{{ $user->last_name }}</td>
                    <td width="30%">{{ $user->email }}</td>
                    <td width="15%">{{ $user->class }}</td>
                    <td width="25%">
                        <a href="{{ route('editStudent', $user->id) }}" class="btn btn-primary btn-sm" wire:navigate>Edit</a>
                        <button class="btn btn-danger btn-sm" wire:click="deleteStudent({{ $user->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        @else
            <tbody>
                <tr>
                    <td colspan="5">
                        <p class="text-center m-0">No students found</p>
                    </td>
                </tr>
            </tbody>
        @endif
    </table>
    <div class="pagination justify-content-center">
        {{$theStudents->links()}}
    </div>
</div>
