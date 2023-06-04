<?php

namespace App\JobClasses;

use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PicResizer
{
  public function __invoke()
  {
    $pics = Storage::files('/public/org-pics');
    foreach ($pics as $k => $pic) {
      if ($k >= 10) break;
      try {
        $img = Image::make(storage_path('/app/' . $pic))->resize(100, 100, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->save("storage/app/public/dist-pics/{$img->filename}_100.{$img->extension}");

        // I assumed that we would delete the original images:
        Storage::delete($pic);
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    dd('fin');
  }
}
