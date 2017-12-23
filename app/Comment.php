<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $table = "Comment";

    // comment nay thuoc tin tuc nao
    public function tintuc()
    {
    	return $this->belongsTo('App\TinTuc', 'idTinTuc', 'id');
    }

    // comment nay thuoc user nao
    public function user()
    {
    	// 1 user co nhieu comment khac nhau
    	// 1 comment thuoc 1 user
    	return $this->belongsTo('App\User', 'idUser', 'id')
    }
}
