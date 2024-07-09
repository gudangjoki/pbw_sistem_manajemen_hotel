<div class="content-header">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <h1>List Ruangan</h1>
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($halls as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->nama_ruangan}}</td>
                        <td>{{$data->jenis_ruangan}}</td>
                        <td>{{$data->fasilitas}}</td>
                        <td>{{$data->harga}}</td>
                        <td><span class="badge badge-warning">{{$data->status}}</span></td>
                        <td class="project-actions text-right"> 
                        @if($data->status != 'pending')             
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fas fa-folder"></i> View
                            </a>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
