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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
   @include('admin.footer')
  </body>
</html>