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
    // ✅ Handle both string & file object
    if (is_string($file)) {
        $filePath = storage_path('app/public/' . $file);
        $fileName = time() . '_' . basename($file);
    } else {
        $filePath = $file->getRealPath();
        $fileName = time() . '_' . $file->getClientOriginalName();
    }

    $response = $this->imageKit->upload([
        'file' => base64_encode(file_get_contents($filePath)),
        'fileName' => $fileName,
        'folder' => $folder,
    ]);

    return [
        'url' => $response->result->url,
        'file_id' => $response->result->fileId,
    ];
}
    /**
     * Delete Image
     */
    public function delete($fileId)
    {
        return $this->imageKit->deleteFile($fileId);
    }
}