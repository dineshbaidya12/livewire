<div>
    <a href="{{route('randomFormSubmission')}}" class="btn btn-secondary" id="back" wire:navigate><- Back</a>
    <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="text-input" class="form-label">Text Input <small>(Min 3, max 15)</small></label>
            <input type="text" class="form-control" id="text-input" wire:model="textInput">
            @error('textInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- <img src="{{asset('uploads/Untitled.png')}}" alt=""> --}}

        <div class="mb-3">
            <label for="email-input" class="form-label">Email Input</label>
            <input type="text" class="form-control" id="email-input" wire:model="emailInput">
            @error('emailInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="url-input" class="form-label">URL</label>
            <input type="text" class="form-control" id="url-input" wire:model="urlInput">
            @error('urlInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="number-input" class="form-label">Number Input</label>
            <input type="text" class="form-control" id="number-input" wire:model="numberInput">
            @error('numberInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="select-input" class="form-label">Select Input</label>
            <select class="form-select" id="select-input" wire:model="selectInput">
                <option value="">Choose...</option>
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
            @error('selectInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="checkbox-input" class="form-label">Checkbox Input</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="checkbox-input1" wire:model="checkboxInput1">
                <label class="form-check-label" for="checkbox-input1">
                    Checkbox 1 <small>(Mendetory)</small>
                </label>
                @error('checkboxInput1') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="2" id="checkbox-input2" wire:model="checkboxInput2">
                <label class="form-check-label" for="checkbox-input2">
                    Checkbox 2
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="radio-input" class="form-label">Radio Input</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-input" id="radio-input1" value="option1" wire:model="radioInput">
                <label class="form-check-label" for="radio-input1">
                    Option 1
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-input" id="radio-input2" value="option2" wire:model="radioInput">
                <label class="form-check-label" for="radio-input2">
                    Option 2
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-input" id="radio-input3" value="option3" wire:model="radioInput">
                <label class="form-check-label" for="radio-input3">
                    Option 3
                </label>
            </div>
            @error('radioInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- <div class="mb-3">
           <img src="{{asset('uploads/2024-05-07_13-18-43_663a2a331443f.png')}}" alt="">
        </div>
        <div class="mb-3">
            <img src="{{asset('uploads/2024-05-07_13-18-43_663a2a331443f.png')}}" alt="">
         </div>
         <div class="mb-3">
            <img src="{{asset('uploads/2024-05-07_13-18-43_663a2a331443f.png')}}" alt="">
         </div> --}}

        <div class="mb-3">
            <label for="file-input" class="form-label">File Input</label>
            <input class="form-control" type="file" id="file-input" wire:model="fileInput">
            @error('fileInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password-input" class="form-label">Password</label>
            <input type="password" class="form-control" id="password-input" wire:model="passwordInput">
        </div>

        <div class="mb-3">
            <label for="confirm-password-input" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password-input" wire:model="confirmPasswordInput">
            @error('confirmPasswordInput') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
