<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){
   $user = User::all();
   $user_only = User::where('role_id','2')->get();
   $role = Role::pluck('nama_role','id');

    return view('user',compact('user','user_only','role'));
   }

   public function tambah(Request $request){
    $user = new User;
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->alamat = $request->alamat;
    $user->no_telp = $request->no_telp;
    $user->role_id = $request->role;
    $user->password = bcrypt($request->password);
    $user->save(); 
    return redirect('/data-user')->with('toast_success', 'User berhasil ditambahkan');
}    

   public function edit_user ($id){
        $user = User::where('id',$id)->get();
        $role = Role::pluck('nama_role','id');

        return view('form-edit-user',compact('user','role'));
   }

   public function update_user(Request $request, $id){
    $ubah_user=User::where('id',$id)
    ->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp,
        'role_id' => $request->role,
        'password' => bcrypt($request->password),
]);

    return redirect('/data-user')->with('toast_success', 'Data User berhasil diubah');
}

   public function hapus($id){

    $user=User::find($id);
        $user->delete();
        return back()->with('toast_success', 'Data User berhasil dihapus');
    
}

public function edit_profil ($id){
    $user = User::where('id',$id)->get();

    return view('form-edit-profil',compact('user'));
}

public function update_profil(Request $request, $id){
$ubah_user=User::where('id',$id)
->update([
    'nama' => $request->nama,
    'email' => $request->email,
    'alamat' => $request->alamat,
    'no_telp' => $request->no_telp,
    'password' => bcrypt($request->password),
]);

return redirect('/home')->with('toast_success', 'Profil anda berhasil diubah');
}

public function excel_user(){
    return Excel::download(new UserExport,'user.xlsx');
}
}
