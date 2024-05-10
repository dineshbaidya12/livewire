<div class="m-3">
    <a href="{{route('home')}}" class="btn btn-secondary" id="back" wire:navigate><- Back</a>
    <form wire:submit.prevent="register">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input wire:model="firstname" type="text" class="form-control" id="firstname" placeholder="Enter first name">
            @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input wire:model="lastname" type="text" class="form-control" id="lastname" placeholder="Enter last name">
            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input wire:model="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <select class="form-control" id="class" wire:model="class">
                <option value="">--Select student class--</option>
                <option value="5">Class 5</option>
                <option value="6">Class 6</option>
                <option value="7">Class 7</option>
                <option value="8">Class 8</option>
            </select>
            @error('class') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input wire:model="password" type="password" class="form-control" id="password" placeholder="Password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
