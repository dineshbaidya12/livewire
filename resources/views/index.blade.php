@extends('layouts.base')

@section('content')
    <div>
        @livewire('studentLists', key('studentLists'))
    </div>

    <script>
        Livewire.on('alert', (data)=> {
            Swal.fire({
                title: data[0].title,
                text: data[0].message,
                icon: data[0].icon
            })
        });

        Livewire.on('delete-alert', (data)=> {
            Swal.fire({
                title: data[0].title,
                text: data[0].message,
                icon: data[0].icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deletedConfirmed');
                }
            });
        });
    </script>

@endsection

