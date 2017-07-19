<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['cover','judul','kategori_id','deskripsi','tanggal'];

    public function kategoris()
    {
    	return $this->belongsTo('App/Kategori');
    }
}
