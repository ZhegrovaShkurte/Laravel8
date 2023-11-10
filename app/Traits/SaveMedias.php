<?php

namespace App\Traits;
use App\Models\Media;
use App\Http\Requests\SaveUserRequest;

trait SaveMedias
{
      public function saveMedias(SaveUserRequest $request, $file, $user)
      {
          $path = $file->store('images', 'public');

          return Media::create([
            'hash_name' => $file->hashName(),
            'size' => $file->getSize(),
            'original_name' => $file->getClientOriginalName(),
            'user_id' => $user->id,
            'path' => 'storage/' . $path,
            'extension' => $file->getClientOriginalExtension(),
          ]);
      }    
      
      }


