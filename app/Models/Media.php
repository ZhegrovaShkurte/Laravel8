<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Media extends Model
{
    use HasFactory;

    
   protected $fillable = [
    'path',
    'original_name',
    'size',
    'hash_name',
    'user_id',
    'extension',
   ];

   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }
}
