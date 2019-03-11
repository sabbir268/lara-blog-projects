<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
	protected $fillable = ['comment_id','approved','author','email','body'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
