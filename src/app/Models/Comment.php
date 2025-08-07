<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'comment', 'product_id', 'user_id'];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
