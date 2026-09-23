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

    public function store(Request $request) {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'NPM' => $request->input('NPM'),
            'kelas_id' => $request->input('kelas_id')
        ]);
        return redirect()->to('/user');
    }

    public function create() {
        $kelas = new KelasModel();
        $dataKelas = $kelas->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $dataKelas,
        ];
        return view('user.create', $data);
    }

    public function index() {
        $data = [
            'title' => 'Data User',
            'user' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }
}
