@extends('main')
@section('judul')
<title>Admin | Edit user</title>
@endsection
@section('sidebar')
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <!-- <li class="nav-header">MASTER</li> -->
      <li class="nav-item active">
        <a href="/" class="nav-link">
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
            <h1>Perubahan Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
            <div class="card">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data User</h5>
                    </div>
                    <div class="modal-body">
                    @foreach ($user as $user)
                    
                    <form action="/update-user{{ $user->id }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                                                    <div class="position-relative form-group">
                                                      <label>Nama</label>
                                                      <input name="nama" type="text" value="{{ $user->nama }}" class="form-control"  required>
                                                    <div class="invalid-feedback">
                                                            Masukkan nama user !
                                                        </div>
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label>Email</label>
                                                        <input name="email" type="text" value="{{ $user->email }}" class="form-control"  required>
                                                    <div class="invalid-feedback">
                                                            Masukkan email !
                                                        </div>
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label>Alamat</label>
                                                        <input name="alamat" type="text" value="{{ $user->alamat }}" class="form-control"  required>
                                                    <div class="invalid-feedback">
                                                            Masukkan alamat !
                                                        </div>
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label>No telp</label>
                                                        <input name="no_telp" type="number" value="{{ $user->no_telp }}" class="form-control"  required>
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
                                                    <div class="position-relative form-group">
                                                        <label>Password</label>
                                                        <input name="password" type="text" value="{{ Str::limit($user->password, 15) }}" class="form-control" minlength="8" required>
                                                    <div class="invalid-feedback">
                                                            Masukkan password (min.8) !
                                                        </div>
                                                    </div>
                    
                        <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
                    </form>
                    @endforeach
                </div>
                </div>
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
@endsection


@section('fot_dinamis')
</body>
</html>
@endsection

