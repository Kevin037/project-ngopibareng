<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $role = Role::all();
     
         return view('role',compact('role'));
        }

        public function tambah(Request $request){
            $role = new Role;
            $role->nama_role = $request->nama;
            $role->save(); 
            return redirect('/data-role')->with('toast_success', 'Role berhasil ditambahkan');
        }    
        
           public function edit_role ($id){
                $role = Role::where('id',$id)->get();
                return view('form-edit-role',compact('role'));
           }
        
           public function update_role(Request $request, $id){
            $ubah_role=Role::where('id',$id)
            ->update([
                'nama_role' => $request->nama,
        ]);
        
            return redirect('/data-role')->with('toast_success', 'Data Role berhasil diubah');
        }
        
           public function hapus($id){
            
            $user=User::where('role_id',$id)->count();

            if ($user == 0) {
                $role=Role::find($id);
                $role->delete();
                return back()->with('toast_success', 'Data Role berhasil dihapus');
            }
            toast('Data role sedang digunakan,
                    Hapus data gagal!','error');
            return back();   
        }
}
