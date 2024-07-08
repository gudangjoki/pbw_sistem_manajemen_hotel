<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <h4 class="mb-4 pb-3">History Bookingan</h4>
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipe</th>
                            <th>ID Booking</th>
                            <th>Tanggal Checkin</th>
                            <th>Tanggal Checkout</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$booking->id_tipe_kamar}}</td>
                            <td>{{$booking->id_booking_room}}</td>
                            <td>{{$booking->check_in}}</td>
                            <td>{{$booking->check_out}}</td>
                            <td><span class="badge badge-warning">{{$booking->status}}</span></td>
                            <td class="project-actions text-right"> 
                            @if($booking->status != 'pending')             
                                <a href="/guest/dashboard/history/{{$booking->id_booking_room}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-folder"></i> View
                                </a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td>2</td>
                            <td>Call of Duty</td>
                            <td>455-981-221</td>
                            <td>El snort testosterone trophy driving gloves handsome</td>
                            <td>$64.50</td>
                            <td><span class="badge badge-success">Terverifikasi</span></td>
                            <td class="project-actions text-right">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fas fa-folder"></i> View
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Call of Duty</td>
                            <td>455-981-221</td>
                            <td>El snort testosterone trophy driving gloves handsome</td>
                            <td>$64.50</td>
                            <td><span class="badge badge-danger">Gagal</span></td>
                            <td class="project-actions text-right">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fas fa-folder"></i> View
                                </button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>