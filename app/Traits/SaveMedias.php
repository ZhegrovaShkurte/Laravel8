<?php

namespace App\Traits;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

trait SaveMedias
{
      public function saveMedias($request, $file, $userId, $type,$postId)
      {
        
           if ($file !== null) {

          $path = 'images/'. $file->hashName();

          \Storage::disk('public')->put('images', $file);

          return Media::create([
            'hash_name' => $file->hashName(),
            'size' => $file->getSize(),
            'original_name' => $file->getClientOriginalName(),
            'user_id' => $userId,
            'post_id' => $postId,
            'path' => 'storage/' . $path,
            'extension' => $file->getClientOriginalExtension(),
            'type' => $type,
          ]);

        }
      }    

    }