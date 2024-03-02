<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class akunController extends Controller
{
    // view halaman daftar akun
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {
            $akun = User::where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('akses', 'like', "%$search%")
                        ->paginate(10);
        } else {
            $akun = User::paginate(10);
        }
        
        return view('akun.view', compact('akun', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required',
            'akses' => 'required',
        ]);

        if ($request->password != $request->confirm_password) {
            return redirect()->back()->withInput()->withErrors(['confirm_password' => 'Konfirmasi password tidak sesuai']);
        }

        $hashedPassword = Hash::make($request->password);

        $akun = new User();
        $akun->name = $request->input('name');
        $akun->email = $request->input('email');
        $akun->password = $hashedPassword;
        $akun->akses = $request->input('akses');
        $akun->save();

        return redirect('/akun')->with('success', 'Registrasi akun Berhasil! Silahkan login');
    }

    public function update(Request $request, $id) {
        $akun = User::find($id);
    
        if (!$akun) {
            return redirect('/akun-add')->with('error', 'Data tidak ditemukan.');
        }
    
        // Validasi data dari formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255', 
            'akses' => 'required|string|max:255',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);
    
        // Periksa apakah kedua password diisi
        if ($request->filled('password') && $request->filled('confirm_password')) {
            // Validasi password
            $request->validate([
                'password' => 'required|string|max:255|same:confirm_password',
            ]);
    
            // Simpan perubahan data termasuk password
            $akun->password = Hash::make($request->input('password'));
        }
    
        // Simpan perubahan data (termasuk jika hanya ada perubahan pada 'name', 'email', atau 'akses')
        $akun->name = $request->input('name');
        $akun->email = $request->input('email');
        $akun->akses = $request->input('akses');
        // Update data lainnya sesuai kebutuhan
        $akun->save();
    
        return redirect('/akun')->with('success', 'Data berhasil diperbarui.');
    }    

    public function destroy($id){
        $akun = User::find($id);

        if (!$akun) {
            return redirect('/akun-add')->with('error', 'Data tidak ditemukan.');
        }

        $akun->delete();

        return redirect('/akun')->with('success', 'Data berhasil diperbarui.');
    }
}
