<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="card ">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('img/background.jpg') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="card ">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="text-light"><i class="fas fa-th-large pr-3"></i>{{ $detail->nama_tipe_kamar }}</h3>
                            <p class="text-muted">{{ $detail->deskripsi }}</p>
                            <br>
                            <div class="text-muted pb-3">
                                <p class="text-sm">Fasilitas
                                    <b class="d-block">Deveint Inc</b>
                                    <b class="d-block">Deveint Inc</b>
                                </p>
                            </div>

                            <form action="/check_date_temp" method="POST">
                            @csrf
                                <div class="input-group my-3">
                                    <p class="text-muted">Checkin</p>
                                    <input id="dp1" type="text" class="ml-3 form-control clickable input-md" id="DtChkIn" placeholder="Check-In" name="check_in" required autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <p class="text-muted">Checkout</p>
                                    <input id="dp2" type="text" class="ml-3 form-control clickable input-md" id="DtChkOut" placeholder="Check-Out" name="check_out" required autocomplete="off">
                                </div>
                                <input type="text" name="id" value="{{$detail->id_tipe_kamar}}" hidden>
                                <input type="text" name="nama" value="{{$detail->nama_tipe_kamar}}" hidden>
                                <input type="text" name="harga" value="{{$detail->harga_kamar}}" hidden>
                                <input type="text" name="deskripsi" value="{{$detail->deskripsi}}" hidden>
                                <input type="text" name="virtual_account" value="{{$va}}" hidden>
                                <div class="text-right mt-5 mb-3">
                                    
                                    <!-- <a href="/guest/dashboard/pembayaran" class="btn btn-md btn-primary">Submit</a> -->
                                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                                 
            </div>
        </div>
    </div>
</div>