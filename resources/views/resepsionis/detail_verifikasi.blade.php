<div class="content-header">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <h1>Detail Verifikasi</h1>
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Detail Verifikasi</h3>

            </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/update_booking_room/{{$id_verifikasi}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('covers/1720415881_cleo-eco-shape.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ID BOOKING</label>
                                    <input type="text" name="id_booking" value="{{$id_verifikasi}}" class="form-control" placeholder="Enter ..." disabled>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Kamar</label>
                                    @foreach($rooms as $room)
                                    <select name="id_kamar" class="category form-control btn btn-default px-4 dropdown-toggle" onchange="getParamsQuery()">
                                        <option selected disabled>Tipe Kamar</option>
                                        <!-- foreach ( $categories as $category ) -->
                                        <option value="{{$room->id_kamar}}">{{$room->id_tipe_kamar}} - {{$room->nomor_kamar}}</option>
                                        <!-- endforeach -->
                                    </select>       
                                    @endforeach                        
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col" >
                            <div class="col-md-12">
                                <button type="submit" name="button" value="accept" class="btn btn-success btn-sm float-right">
                                    <i class="fas fa-pencil-alt"></i>
                                    Verifikasi
                                </button>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <button type="submit" name="button" value="reject" class="btn btn-warning btn-sm float-right">
                                    <i class="fas fa-pencil-alt"></i>
                                    Tidak Verifikasi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
