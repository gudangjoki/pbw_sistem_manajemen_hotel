<div class="content-header">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <h1>List Konfirmasi</h1>
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 10%">
                        ID Booking
                    </th>
                    <th style="width: 20%">
                        Checkin
                    </th>
                    <th style="width: 30%">
                        Checkout
                    </th>
                    <th style="width: 15%">
                        Status 
                    </th>
                    <th style="width: 10%">
                        Action 
                    </th>
                </tr>
            </thead>
            <tbody>
        @foreach ($booking_rooms as $booking)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$booking->id_booking_room}}
                    </td>
                    <td>
                        {{$booking->check_in}}
                    </td>
                    <td>
                        {{$booking->check_out}}
                    </td>
                    <td>
                        {{$booking->status}}
                    </td>
                    <td class="project-actions text-right">  
                        <!-- <a href="{{ route('resepsionis.detail_konfirmasi') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                            Konfirmasi
                        </a> -->
                        @if($booking->status == 'confirmed')
                        <form action="/check_in/{{$booking->id_booking_room}}" method="POST">
                            @csrf
                            @method("PUT")
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                                Cekin
                            </button>
                        </form>
                        @else if($booking->status == 'checked_in')
                        <form action="/check_out/{{$booking->id_booking_room}}" method="POST">
                            @csrf
                            @method("PUT")
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                                Cekout
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
        @endforeach
            </tbody>        
        </table>
    </div>
</section>
    