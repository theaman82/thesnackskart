<?php

namespace App\Services;

use ImageKit\ImageKit;

class ImageKitService
{
    protected $imageKit;

    public function __construct()
    {
        $this->imageKit = new ImageKit(
            config('services.imagekit.public_key'),
            config('services.imagekit.private_key'),
            config('services.imagekit.url_endpoint')
        );
    }

    /**
     * Upload Image
     */
    public function upload($file, $folder = 'products')
    {
        $fileName = time() . '_' . $file->getClientOriginalName();

        $response = $this->imageKit->upload([
            'file' => fopen($file->getRealPath(), 'r'),
            'fileName' => $fileName,
            'folder' => $folder,
        ]);

        return $response->result->url;
    }

    /**
     * Delete Image
     */
    public function delete($fileId)
    {
        return $this->imageKit->deleteFile($fileId);
    }
}