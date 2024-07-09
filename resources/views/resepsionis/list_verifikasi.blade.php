<div class="content-header">
    <div class="container-fluid px-md-5 mt-md-5 ml-0 mt-0">
        <h1>List Verifikasi</h1>
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
                        Username
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
                @foreach($book_verify as $verify)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$verify->username}}
                    </td>
                    <td>
                        {{$verify->check_in}}
                    </td>
                    <td>
                        {{$verify->check_out}}
                    </td>
                    <td>
                        {{$verify->status}}
                    </td>
                    <td class="project-actions text-right">  
                        <a href="/resepsionis/dashboard/detail_verifikasi/{{$verify->id_booking_room}}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
        </tbody>        
    </table>
    </div>
</section>