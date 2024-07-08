<div class="content-header">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <h1>List Status Kamar</h1>
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
                    <th style="width: 20%">
                        Tipe Kamar
                    </th>
                    <th style="width: 30%">
                        Nomor Kamar
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
                @foreach ($kamars as $kamar)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{ $kamar->id_tipe_kamar }}
                    </td>
                    <td>
                        {{ $kamar->nomor_kamar }}
                    </td>
                    <td>
                        {{ !$kamar->status_kamar ? "Not Available" : "Available" }}
                    </td>

                    @if ($kamar->status_kamar == 0)
                    <form action="/set_active/{{$kamar->id_kamar}}" method="POST">
                        @csrf
                        @method("PUT")
                        <td class="project-actions text-right">  
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                                Active
                            </button>
                        </td>
                    </form>
                    @else
                    <form action="/set_non_active/{{$kamar->id_kamar}}" method="POST">
                        @csrf
                        @method("PUT")
                    <td class="project-actions text-right">  
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                            Not Active
                        </button>
                    </td>
                    </form>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- /.content -->
