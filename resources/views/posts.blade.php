@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-6">
            @livewire('makePost')
        </div>
        <div class="col-6" style="height: 88vh; overflow:auto;">
            @livewire('posts')
        </div>
    </div>
    <script>
        Livewire.on('alert', (data)=> {
            Swal.fire({
                title: data[0].title,
                text: data[0].message,
                icon: data[0].icon
            })
        });
       

        $(document).ready(function(){
            $('#form_file').click(function(){
                $('#form_file').val("");
            });
            
            $(document).on('click', '.show-cmnt-btn', function(){
                let postId = $(this).data('postid');
                console.log(postId);
                $('.comments').not('#comment_'+postId).removeClass('show');
                $('#comment_'+postId).toggleClass('show');
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
                    Livewire.dispatch(data[0].confirmFunction);
                }
            });

        });

        });


    </script>
@endsection