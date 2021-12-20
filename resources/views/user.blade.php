@extends('main')
@section('judul')

@if(auth()->user()->role_id=='1') 
        <title>Admin - Data User</title>
      @endif
@if(auth()->user()->role_id=='2') 
        <title>User - Data User</title>
        @endif
@endsection
@section('sidebar')
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item active">
        <a href="/home" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tools"></i>
          <p>
            Master
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/data-user" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Data User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/data-role" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Role User</p>
              </a>
            </li>
          </ul>
      </li>
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
@endsection


@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data user</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12">
            <button type="button" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#form_kategori">+ Tambah</button>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover datatable">
                  
                  <thead>
                    <a href="/excel-user" class="btn btn-success mb-1">Excel</a>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No telp</th>
                    @if(auth()->user()->role_id=='1') 
                    <th>Role</th>
                    <th>Password</th>
                    <th>Tindakan</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                    @if(auth()->user()->role_id=='1') 
                    @foreach($user as $user)
                    
                  <tr>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->no_telp }}</td>
                    <td>{{ $user->role->nama_role }}</td>
                    <td>(Ter-enkripsi)</td>
                    <td>
                      <a href="/edit-user{{ $user->id }}" class="btn mr-2 mb-2 btn-warning"><i class="fa fa-edit ">Ubah</i></a>
                      <a href="#" data-id="{{ $user->id }}" data-nama="{{ $user->nama }}" class="btn mr-2 mb-2 btn-danger hapus_user"><i class="fa fa-delete ">Hapus</i></a>
                  </td>
                    
                  </tr>
                  @endforeach
                  @endif

                  @if(auth()->user()->role_id=='2') 
                    @foreach($user as $user)
                  <tr>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->no_telp }}</td>
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="form_kategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form action="/tambah-user" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="position-relative form-group"><label>Nama User</label>
              <input name="nama" type="text" class="form-control"  required>
                <div class="invalid-feedback">
                    Masukkan nama user !
                </div>
            </div>
            <div class="position-relative form-group"><label>Email</label>
              <input name="email" type="email" class="form-control"  required>
                <div class="invalid-feedback">
                    Masukkan email !
                    </div>
            </div>
            <div class="position-relative form-group">
              <label>Alamat</label>
              <input name="alamat" type="text" class="form-control"  required>
          <div class="invalid-feedback">
                  Masukkan alamat !
              </div>
          </div>
          <div class="position-relative form-group">
              <label>No telp</label>
              <input name="no_telp" type="text" class="form-control"  required>
          <div class="invalid-feedback">
                  Masukkan no_telp !
              </div>
          </div>
          <div class="position-relative form-group"><label>Role</label>
              <select class="form-control" name="role" required>
                  <option value="">-Pilih Role-</option>
                  @foreach ($role as $role => $value)
                  <option value="{{ $role }}">{{ $value }}</option>
                  @endforeach
                </select>
              <div class="invalid-feedback">
                      Masukkan kategori produk !
                  </div>
              </div>
            <div class="position-relative form-group"><label>Password</label>
              <input name="password" type="text" class="form-control"  required>
            <div class="invalid-feedback">
                    Masukkan password !
                </div>
            </div>
             <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
			</form>
        </div>
    </div>
</div>
@endsection
@section('fot_dinamis')
<script>
 $(".hapus_user").click(function(){
    var id_user = $(this).attr('data-id');
    var nama_user =  $(this).attr('data-nama');
    Swal.fire({
    title: 'Yakin?',
    text: "Hapus User "+nama_user+" dari daftar",
    imageWidth: 170,
    imageHeight: 230,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location = "/hapus-user"+id_user+""
    }
    })
      });
</script>
</body>
</html>
@endsection

