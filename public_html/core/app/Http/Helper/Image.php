<?php

use Intervention\Image\Facades\Image;


//get images paths
function imagePath()
{
    $data['gateway'] = [
        'path' => 'asset/images/gateway',
        'size' => '800x800',
    ];
    $data['verify'] = [
        'withdraw' => [
            'path' => 'asset/images/verify/withdraw'
        ],
        'deposit' => [
            'path' => 'asset/images/verify/deposit'
        ]
    ];

    $data['withdraw'] = [
        'method' => [
            'path' => 'asset/images/withdraw/method',
            'size' => '800x800',
        ]
    ];
    $data['ticket'] = [
        'path' => 'support',
    ];
    $data['language'] = [
        'path' => 'asset/images/lang',
        'size' => '64x64'
    ];

    $data['jobs'] = [
        'path' => 'asset/images/jobs',
        'size' => '800x800'
    ];

    $data['users'] = [
        'path' => 'asset/images/users',
        'size' => '200x200'
    ];

    $data['offers'] = [
        'path' => 'asset/images/offerwalls',
        'size' => '800x800'
    ];

    return $data;
}

//upload images
function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new \Exception('File could not been created.');

    if ($old) {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }
    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $image = Image::make($file);
    if ($size) {
        $size = explode('x', strtolower($size));
        $image->resize($size[0], $size[1]);
    }
    $image->save($location . '/' . $filename);

    if ($thumb) {
        $thumb = explode('x', $thumb);
        Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
    }

    return $filename;
}
    
//upload files
function uploadFile($file, $location, $size = null, $old = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new \Exception('File could not been created.');

    if ($old) {
        removeFile($location . '/' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $file->move($location, $filename);
    return $filename;
}

//as it is , make directory
function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


//delete files
function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        return route('placeholder.image', $size);
    }
    // return asset('asset/images/default.png');
    return asset('asset/images/users/default.png');
}

