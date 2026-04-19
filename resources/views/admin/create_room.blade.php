<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')


  </head>
  <body>
   @include('admin.header')
   
   @include('admin.sidebar')
  
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fa-solid fa-circle-exclamation"></i> Error!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fa-solid fa-circle-check"></i> Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div>
              <h1 style="font-size: 30px; font-weight: bold;" >Add Rooms</h1>
               
              <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data">
                @csrf 
                
                 <div  class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Room Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Description</label>
                    <textarea  name="description" class="form-control" required>{{ old('description') }}</textarea>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="type" class="form-select" required>
                      <option value="">Select a type</option>
                      <option value="regular" {{ old('type') == 'regular' ? 'selected' : '' }}>Regular</option>
                      <option value="premium" {{ old('type') == 'premium' ? 'selected' : '' }}>Premium</option>
                      <option value="deluxe" {{ old('type') == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                    </select>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Free Wifi</label>
                    <select name="wifi" class="form-select" required>
                      <option value="">Select an option</option>
                      <option value="yes" {{ old('wifi') == 'yes' ? 'selected' : '' }}>Yes</option>
                      <option value="no" {{ old('wifi') == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif" required>
                  </div>

                  <div class="col-md-12">
                    <input class="btn btn-primary float-end" type="submit" value="Add Room" >
                  </div>
                </div>
              </form>
              
            </div>

          </div>
        </div>
    </div>
    

   @include('admin.footer')
  </body>
</html>