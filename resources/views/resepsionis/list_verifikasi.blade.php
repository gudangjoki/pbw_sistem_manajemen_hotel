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
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td class="project-actions text-right">  
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                            Verifikasi
                        </button>
                        <a href="{{ route('resepsionis.detail_verifikasi') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                            Detail
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>