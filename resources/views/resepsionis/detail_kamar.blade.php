
<div class="content-header">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <h1>Detail Konfirmasi</h1>
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Detail Konfirmasi</h3>

            </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/buku" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- <div class="col-sm-6"> -->
                                <!-- text input -->
                                <!-- <div class="form-group">
                                    <label>Kode Buku</label>
                                    <input type="text" class="form-control" placeholder="Enter ...">
                                </div> -->
                            <!-- </div> -->
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="custom-file">
                                        <input type="file" name="cover" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
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