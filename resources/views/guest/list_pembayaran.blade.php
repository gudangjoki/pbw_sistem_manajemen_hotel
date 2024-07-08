
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row">
            <div class="col-12">


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                        <small class="float-right">Date: 2/10/2014</small>
                    </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-8 invoice-col">
                    <address>
                        <!-- Tipe Kamar Deluxe<br>
                        Tanggal Checkin : 07/07/2024<br>
                        Tanggal Checkout : 07/07/2024 <br> -->
                    </address>
                    </div>
                    <!-- /.col -->
                    <!-- <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                    </div> -->
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col mb-4">
                    <b>Virtual Account Billing #{{ $status['virtual_account'] }}</b><br>
                    <br>
                    <b>Tanggal Checkin :</b>{{ $status['check_in'] }}<br>
                    <b>Tanggal Checkout :</b>{{ $status['check_out'] }}<br>
                    <b>ID Tipe Kamar:</b> {{$status['id']}}
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipe Kamar</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{$status['nama']}}</td>
                                <td>{{$status['harga']}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <form action="/pay_room_booking" method="POST" enctype="multipart/form-data">
                    <div class="col-12 col-md-6 mt-4">
                        <p class="lead">Kirimkan Bukti Pembayaran:</p>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="cover" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Select</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> 
                                Submit Payment
                            </button>
                        </form>
                        <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button>
                    </div>
                </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
</div>