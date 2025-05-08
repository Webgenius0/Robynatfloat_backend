<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
   protected $fillable= ['user_id','gallery_image'];

   protected $hidden = ['created_at', 'updated_at'];

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
