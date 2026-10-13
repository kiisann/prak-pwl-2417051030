<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class UserModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = ['id'];

    public function kelas() {
        return $this->belongsTo(KelasModel::class, 'kelas_id');
    }

    public function getUser() {
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                    ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                    ->orderBy('user.created_at', 'asc')
                    ->get();
    }

}
