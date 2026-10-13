<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\KelasModel;

class UserController extends Controller
{

    public $userModel;
    public $kelas; 

    public function __construct() {
        $this->userModel = new UserModel();
        $this->kelas = new KelasModel();
    }

    public function index() {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function create() {
        $kelas = new KelasModel();
        $dataKelas = $kelas->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $dataKelas,
        ];
        return view('create_user', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id')
        ]);

        return redirect()->to('/user')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id) {
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelas->getKelas();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::findOrFail($id);
        $user->update([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id) {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
