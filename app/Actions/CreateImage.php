<?php
namespace App\Actions;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class CreateImage
{
    public function handle($data)
    {
        $image = new Image();
            $collection = [];
            $images = $data->images;
            foreach($images as $key=>$image){
                $newName = "product.".uniqid().'.'.$image->extension();
                $collection[$key] = [
                    'imageable_id' => $data->id,
                    'imageable_type' => $data->type,
                    'path' => asset(Storage::url($newName))
                ];
                 $image->storeAs('public/',$newName);

            }
            Image::insert($collection);
    }
}
