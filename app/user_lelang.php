<?php

namespace App;
use App\user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;
class user_lelang extends Model
{
    use SoftDeletes;
    protected $table = "ngist_user_lelang";
    protected $fillable =['id', 'nama_perusahaan', 'alamat', 'telp', 'no_nib', 'file', 'email', 'user_id', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}


