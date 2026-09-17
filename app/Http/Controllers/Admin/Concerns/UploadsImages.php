<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\Request;

trait UploadsImages
{
    protected function uploadImage(Request $request, string $field, string $folder): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        $filename = uniqid().'.'.$request->file($field)->extension();
        $request->file($field)->move(public_path("img/uploads/{$folder}"), $filename);

        return "img/uploads/{$folder}/{$filename}";
    }
}
