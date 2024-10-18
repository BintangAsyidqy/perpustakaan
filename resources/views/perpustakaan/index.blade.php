
     
 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800">Perpustakaan</h1>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr class="text-center">
                         <th>Nama</th>
                         <th>Email</th>
                         <th>Alamat</th>
                         <th>No Telepon</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                    <?php $no = 1; ?>
                @foreach ($perpustakaan as $row)
                {{-- <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->no_telp }}</td>
                    <td> --}}
                        <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>edit</a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash">hapus</i></a>
                    {{-- </td>
                </tr> --}}
                @endforeach
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 
 @endsection
 
 