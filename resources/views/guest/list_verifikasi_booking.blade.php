@if($booking->status == 'confirmed')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Cancel booking hanya bisa dilakukan 3 hari sebelum checkin
            </div>
            <div class="card card-success card-outline">
              <form id="quickForm">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <input type="text" name="password" class="form-control" placeholder="{{$booking->status}}" disabled>
                        </div>
                        <label for="exampleInputEmail1">ID BOOKING</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{$booking->id_booking_room}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Keterangan</label>
                        <input type="text" name="password" class="form-control" placeholder="{{$booking->catatan_verifikasi}}" disabled>
                    </div>
                </div>
                <div class="card-footer">
                  <a href="" class="btn btn-primary">Back</a>
                  @if ($later_days < $booking->check_in)
                  <form action="/cancel/{{$booking->id_booking_room}}" method="DELETE">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning float-right">Cancel Booking</button>
                  </form>
                  @else
                  <div></div>
                  @endif
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@else
<!-- jika tidak Terverifikasi -->

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="card card-danger card-outline">
              <form id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <input type="text" name="password" class="form-control" placeholder="Terverifikasi">
                    </div>
                    <label for="exampleInputEmail1">ID BOOKING</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ID Booking">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <input type="text" name="password" class="form-control" placeholder="Keterangan">
                  </div>
                </div>
                <div class="card-footer">
                <a href="" class="btn btn-primary">Back</a>
                @if ($later_days < $booking->check_in)
                  <form action="/cancel/{{$booking->id_booking_room}}" method="DELETE">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning float-right">Cancel Booking</button>
                  </form>
                @else
                <div></div>
                @endif
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endif