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
            
            <div>
              <h1 style="font-size: 30px; font-weight: bold;" >Add Rooms</h1>
               
              <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data">
                @csrf 
                
                 <div  class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Room Title</label>
                    <input type="text" name="title" class="form-control" >
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Description</label>
                    <textarea  name="description" class="form-control" ></textarea>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" >
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="type" class="form-select">
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    
                    </select >
                  </div>

                  <div class="col-md-4 mb-3">
                    <label class="form-label">Free Wifi</label>
                    <select name="wifi" class="form-select">
                      <option selected value="regular">Regular</option>
                      <option value="premium">Premium</option>
                      <option value="deluxe">Deluxe</option>
                    </select >
                  </div>

                  <div class="col-md-4 mb-3">
                    <label>Upload Image</label>
                    <input type="file" name="image" class="form-control">
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