<?php

namespace App\Http\Wrappers;

class CloudinaryService
{
    public static function upload($image, $publicId = '')
    {
        try {
            $result = cloudinary()->upload($image, ['public_id' => uniqid('obms-' . $publicId)]);
            return (object)['url' => $result->getPath(), 'secureUrl' => $result->getSecurePath(), 'publicId' => $result->getPublicId()];
        } catch (\Exception $e) {
        }
    }
}
