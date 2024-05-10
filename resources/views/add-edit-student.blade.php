@extends('layouts.base')

@section('content')
    <div>
        @livewire('addStudentForm', ['studentId' => $studentId], key('addStudentForm1'))
    </div>

    <script>
        Livewire.on('alert', (data)=> {
            Swal.fire({
                title: data[0].title,
                text: data[0].message,
                icon: data[0].icon
            })
        });

        Livewire.on('back', (data)=> {
            document.getElementById('back').click();
        });
    </script>
@endsection