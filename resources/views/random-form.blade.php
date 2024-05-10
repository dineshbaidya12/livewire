@extends('layouts.base')

@section('content')
    <div>
        @livewire('RandomForm', ['key' => Str::uuid()])
    </div>
    <script>
        Livewire.on('alert', (data)=> {
            Swal.fire({
                title: data[0].title,
                text: data[0].message,
                icon: data[0].icon
            })
        });

        Livewire.on('redirectToPage', page_id => {
            const id = page_id[0];
            console.log(page_id[0]);
            const selector = '#' + id;
            const element = document.querySelector(selector);
            if (element) {
                element.click();
            }
        });
    </script>
@endsection

