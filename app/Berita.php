<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul','kategori_id','deskripsi','tanggal','cover'];

    public function kategoris()
    {
    	return $this->belongsTo('App/Kategori');
    }
}
