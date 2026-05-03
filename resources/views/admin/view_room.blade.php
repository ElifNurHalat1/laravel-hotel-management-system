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

                    <div class="table-responsive mx-auto bg-light rounded shadow-sm p-3" style="max-width: 68rem;">
                        <table class="table table-dark table-hover table-bordered table-striped  align-middle mb-0">
                            <thead>
                                <tr >
                                    <th>Room Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>WiFi</th>
                                    <th>Room Type</th>
                                    <th>Image</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $room)
                                <tr>
                                    <td>{{ $room->room_title }}</td>
                                    <td>{!! Str::limit($room->description, 100) !!}</td>
                                    <td>${{ $room->price }}</td>
                                    <td>{{ $room->wifi }}</td>
                                    <td>{{ $room->room_type }}</td>
                                    <td>
                                        <img src="{{ asset('room/' . $room->image) }}" alt="{{ $room->room_title }}" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td class="text-center">
                                        <form method="POST" action="{{url('room_delete',$room->id)}}" style="display:inline;" class="delete-form">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('room_update', $room->id) }}" class="btn btn-warning">Update</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
   @include('admin.footer')
   
   @php
       if(session('success')) {
           echo \App\Helpers\ToastHelper::showToast('success', session('success'));
       }
   @endphp

   <script>
       document.querySelectorAll('.delete-form').forEach(form => {
           form.addEventListener('submit', function(e) {
               e.preventDefault();
                Swal.fire({
                   title: 'Are you sure?',
                   text: 'You will not be able to recover this room!',
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#d33',
                   cancelButtonColor: '#6c757d',
                   confirmButtonText: 'Yes, Delete',
                   cancelButtonText: 'Cancel'
               }).then((result) => {
                   if (result.isConfirmed) {
                       form.submit();
                   }
               })
           });
       });
   </script>
  </body>
</html>