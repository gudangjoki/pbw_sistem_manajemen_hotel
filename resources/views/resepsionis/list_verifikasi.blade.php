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
                <button type="submit" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                    Verifikasi
                </button>
                <button type="submit" class="btn btn-info btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                    Detail
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>