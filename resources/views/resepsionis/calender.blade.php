<div class="content-header">
    <div class="container-fluid px-md-5 mt-md-3 ml-0 mt-0">
        <h1>Calender</h1>
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid px-md-5 mt-md-2 ml-0 mt-0">
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <!-- <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Draggable Events</h4>
                        </div>
                        <div class="card-body">
                            <div id="external-events">
                            <div class="external-event bg-success">Lunch</div>
                            <div class="external-event bg-warning">Go home</div>
                            <div class="external-event bg-info">Do homework</div>
                            <div class="external-event bg-primary">Work on UI design</div>
                            <div class="external-event bg-danger">Sleep tight</div>
                            <div class="checkbox">
                                <label for="drop-remove">
                                <input type="checkbox" id="drop-remove">
                                remove after drop
                                </label>
                            </div>
                            </div>
                        </div>
                    </div> -->
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Semua Kamar</h3>
                            <div class="card-tools">
                                <a class="text-danger mx-3"><i class="fas fa-square pr-2"></i>Empty</a>
                                <a class="text-info"><i class="fas fa-square pr-2"></i>Fill</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($kategoriKamarGroups as $namaTipeKamar => $kamars)
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span>{{ $namaTipeKamar }}</span>
                                    
                                    <div class="d-flex flex-wrap">
                                        @foreach($kamars as $kamar)
                                            @if($kamar['status']==1)
                                            <div class="btn btn-info mx-1 my-1">
                                                {{ $kamar['nomor_kamar'] }}
                                            </div>
                                            @else
                                            <div class="btn btn-danger mx-1 my-1">
                                                {{ $kamar['nomor_kamar'] }}
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Hall/Meeting Room</h3>
                            <div class="card-tools">
                                <a class="text-danger mx-3"><i class="fas fa-square pr-2"></i>Empty</a>
                                <a class="text-info"><i class="fas fa-square pr-2"></i>Fill</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    
                                    <div class="d-flex flex-wrap">
                                        @foreach($halls as $hall)
                                            @if($hall['status']=='Tersedia')
                                            <div class="btn btn-info mx-1 my-1">
                                                {{ $hall['id'] }}
                                            </div>
                                            @else
                                            <div class="btn btn-danger mx-1 my-1">
                                                {{ $hall['id'] }}
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar">
                    </div>
                    <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>