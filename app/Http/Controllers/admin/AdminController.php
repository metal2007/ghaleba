<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Intervention\Image\facades\Images;


class AdminController extends Controller
{
    protected function UploadImages($file)
    {
      $year = Carbon::now()->year;
      $imagepath = "/upload/images/{$year}/";
    //   $filename = $file->getClientOriginalName();
    // $date = now()->format('Y-m-d-H-i-s');

      $filename = time().$file->getClientOriginalName();

      $file =  $file->move(public_path($imagepath), $filename);

      $sizes = ["300","600","900"];
      $url['images'] = $this->resize($file->getRealPath(), $sizes, $imagepath, $filename);
      $url['thumb'] = $url['images'][$sizes[0]];

// dd($url);
return $url;
    }


private function resize($path, $sizes, $imagepath,  $filename)
{
  $images['original'] = $imagepath.$filename;
  foreach($sizes as $size){
    $images[$size] =  $imagepath . "{$size}" . $filename;

    Image::make($path)->resize($size, null, function($constraint){
        $constraint->aspectRatio();
      })->save(public_path($images[$size]));


  }

return $images;
}
}
