<?php

namespace App\Traits;

trait UploadTrait
{

    private function imageUpload($images, $imageColumn = null)
    {
        $uploadeImages = [];

        if (is_array($images)) {
            foreach ($images as $image) {
                $uploadeImages[] = [$imageColumn => $image->store('products', 'public')];
            }
        } else {
            $uploadeImages = $images->store('logo', 'public');
        }

        return $uploadeImages;
    }
}
