<!DOCTYPE html>
<html>
  <head> 

  <base href="/public"> >
     @include('admin.css')


  </head>
  <body>
   @include('admin.header')
   
   @include('admin.sidebar')
  
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div>
              <h1 class="text-center" style="font-size: 30px; font-weight: bold;">Update Rooms</h1>
               
              <form action="{{url('edit_room', $data->id )}}" method="post" enctype="multipart/form-data">
                @csrf 
                
                 <div  class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Room Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $data->room_title }}" required>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Description</label>
                    <textarea  name="description" class="form-control" required>{{ $data->description }}</textarea>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $data->price }}" required>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="type" class="form-select" required>
                      <option value="">Select a type</option>
                      <option value="regular" {{ $data->room_type == 'regular' ? 'selected' : '' }}>Regular</option>
                      <option value="premium" {{ $data->room_type == 'premium' ? 'selected' : '' }}>Premium</option>
                      <option value="deluxe" {{ $data->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                    </select>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Free Wifi</label>
                    <select name="wifi" class="form-select" required>
                      <option value="">Select an option</option>
                      <option value="yes" {{ $data->wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                      <option value="no" {{ $data->wifi == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                  </div>

                   

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif" required>
                  </div>

                  <div class="col-md-8 mb-3">
                  </div>

                  <div class="col-md-4 mb-3 text-center">
                    <label class="form-label d-block">Current Image</label>
                    <img src="{{ asset('room/' . $data->image) }}" alt="{{ $data->room_title }}" class="mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                  </div>

                  <div class="col-md-12">
                    <input class="btn btn-primary float-end" type="submit" value="Update Room" >
                  </div>
                </div>
              </form>
              
            </div>

          </div>
        </div>
    </div>
    

   @include('admin.footer')
   
   @php
       if(session('success')) {
           echo \App\Helpers\ToastHelper::showToast('success', session('success'));
       }
       if($errors->any()) {
           foreach($errors->all() as $error) {
               echo \App\Helpers\ToastHelper::showToast('error', $error);
           }
       }
   @endphp
  </body>
</html>