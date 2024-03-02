<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\book;
use Illuminate\Support\Facades\Hash;

class settingController extends Controller
{
    //
    public function index($id)
    {  
        $akun = User::find($id);

        $namaUploader = $akun->name;

        $buku = book::where('uploader', 'like', "%$namaUploader%")
                        ->paginate(10);

        if (!$akun) {
            return redirect('/akun-add')->with('error', 'Data tidak ditemukan.');
        }

        return view('akun.setting', compact('akun', 'buku'));
    }

    public function update(Request $request, $id) {
        $akun = User::find($id);
    
        if (!$akun) {
            return redirect('/akun-add')->with('error', 'Data tidak ditemukan.');
        }

         // Validasi data dari formulir
         $request->validate([
            'passwordlama' => 'required|string|max:255',
            'passwordbaru' => 'required|string|max:255',
            'confirm_password' => 'required|string|max:255',
        ]);
        
        $password = $akun->password;
        $passwordlama = $request->input('passwordlama');
        $passwordbaru = $request->input('passwordbaru');
        $confirm_password = $request->input('confirm_password');

        if (Hash::check($passwordlama, $password)) {
            if ($passwordbaru == $confirm_password) {
                // Encrypt password
                $hashedPassword = Hash::make($passwordbaru);

                $akun->password = $hashedPassword;
                $akun->save();

                return redirect()->route('setting.index', ['id' => $akun->id])->with('success', 'Password berhasil diperbarui!');
                // return back()->route('dashboard')->with('success', 'Password berhasil diperbarui!');
            } else {
                return back()->with('error', 'Konfirmasi Password harus sama!');
            }
        } else {
            return back()->with('error', 'Password lama tidak benar!');
        }
    }    
}
