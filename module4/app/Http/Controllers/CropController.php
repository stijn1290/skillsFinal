<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CropController extends Controller
{
    public function crop(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'width' => 'required|integer|max:2048',
            'height' => 'required|integer|max:2048',
        ]);
        $image = $request->file('image');
        $path = $image->getRealPath();
        $extension = $image->extension();
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $src = imagecreatefromjpeg($path);
                break;
            case 'png':
                $src = imagecreatefrompng($path);
                break;
            case 'gif':
                $src = imagecreatefromgif($path);
                break;
            default:
                return response()->json(['error' => 'Unsupported format'], 422);
        }
        list($width, $height) = getimagesize($path);
        $thumbnail = imagecreatetruecolor($request->get('width'), $request->get('height'));
        imagecopyresampled($thumbnail, $src, 0, 0, 0, 0, $request->get('width'), $request->get('height'), $width, $height);
        ob_start();
        imagejpeg($thumbnail);
        $imageData = ob_get_clean();
        imagedestroy($thumbnail);
        imagedestroy($src);
        $base64 = 'data:image/jpeg;base64,' . base64_encode($imageData);
        return view('croppedimage', ['imageData' => $base64]);
    }
}
