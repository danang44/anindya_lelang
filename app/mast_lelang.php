<?php

namespace App;
use App\user;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Softdeletes;
class mast_lelang extends Model
{
    // use SoftDeletes;
    protected $table = "ngist_mast_lelang";
    protected $fillable =['id', 'nama_perusahaan', 'tgl_mulai', 'tgl_akhir', 'desc', 'scope', 'harga', 'created_by', 'is_active'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'created_by', 'id');
    // }
}


