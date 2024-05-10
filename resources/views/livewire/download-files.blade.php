<div>
    <style>
        .card{
            width: 150px;
        }
        img{
            height: 150px;
            object-fit: cover;
        }
    </style>
    <div class="container">
        <h2 class="mt-4 mb-4">Image Gallery</h2>
        <div class="row">

          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="{{ asset('storage/public/files/user1.png') }}" class="card-img-top" alt="Image 1">

              <div class="card-body">
                <h5 class="card-title"><button class="btn btn-warning" wire:click="download('{{asset('files/user1.png')}}')">Download</button></h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="{{asset('files/user2.png')}}" class="card-img-top" alt="Image 2">
              <div class="card-body">
                <h5 class="card-title"><button class="btn btn-warning" wire:click="download('{{asset('files/user2.png')}}')">Download</button></h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="{{asset('files/user3.png')}}" class="card-img-top" alt="Image 2">
              <div class="card-body">
                <h5 class="card-title"><button class="btn btn-warning" wire:click="download('{{asset('files/user3.png')}}')">Download</button></h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="{{asset('files/user1.png')}}" class="card-img-top" alt="Image 2">
              <div class="card-body">
                <h5 class="card-title">Image 2</h5>
              </div>
            </div>
          </div>

        </div>
      </div>
</div>
