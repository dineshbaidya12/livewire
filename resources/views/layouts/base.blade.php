<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    @livewireStyles
    @livewireScripts
    <style>
        .active{
            color: red;
        }
        #showNotifications{
            position: absolute;
            background: white;
            width: 250px;
            right: 41.2%;
            top: 8%;
            border: 1px solid gray;
            border-radius: 10px;
            padding: 22px;
            height: 250px;
            overflow: auto;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 m-0" style="width:99.2%;">
        
        <div class="row p-0">
            @livewire('notification')
        </div>

        
        <div class="row">
            
            <div class="col-2 bg-light" style="height: 94.5vh; overflow: auto;">
                <div class="py-3">
                    <a href="{{ route('home') }}" class="{{ request()->route()->getName() == 'home' ? 'active' : '' }}" wire:navigate>Dashboard</a>
                    <br>
                    <a href="{{ route('addNewStudent') }}" class="{{ request()->route()->getName() == 'addNewStudent' || request()->route()->getName() == 'editStudent' ? 'active' : '' }}" wire:navigate>Add New Student</a>
                    <br>
                    <a href="{{ route('studentClasses') }}" class="{{ request()->route()->getName() == 'studentClasses' ? 'active' : ''}}" wire:navigate>Student Class</a>
                    <br>
                    <a href="{{ route('randomFormSubmission') }}" class="{{ request()->route()->getName() == 'randomFormSubmission' ? 'active' : ''}}" id="random_form_submission" wire:navigate>Random Form Submissions</a>
                    <br>
                    <a href="{{ route('randomForm') }}" class="{{ request()->route()->getName() == 'randomForm' ? 'active' : ''}}" wire:navigate>Random Form</a>
                    <br>
                    <a href="{{ route('attendence') }}" class="{{ request()->route()->getName() == 'attendence' ? 'active' : ''}}" wire:navigate>Attendence - Livewire</a>
                    <br>
                    <a href="{{ route('attendence2') }}" class="{{ request()->route()->getName() == 'attendence2' ? 'active' : ''}}" wire:navigate>Attendence - Blade Only</a>
                    <br>
                    <a href="{{ route('posts') }}" class="{{ request()->route()->getName() == 'posts' ? 'active' : ''}}" wire:navigate>Posts</a>
                </div>
            </div>

            
            <div class="col-10">
                <div class="py-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session("success") }}',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif
    @if(session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session("error") }}',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif
    <script>
        $('#allNotification').on('click', function(){
            $('#showNotifications').toggle('show');
        });
    </script>
</body>
</html>