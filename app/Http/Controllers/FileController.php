<?php

namespace App\Http\Controllers;

use App\Models\FileOwner;
use Illuminate\Http\Request;
use App\Http\Resources\File\FileResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class FileController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');

        $media = FileOwner::first()->addMedia($file)
            ->toMediaCollection();

        return response()->json([
            'message' => __('Media uploaded successfully'),
            'file' => new FileResource($media),
        ]);
    }

    public function show()
    {
        return $this->respondWithSuccess(
            __('Loaded Successfully'),
            [
                // 'file' => new FileResource($file),
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $file)
    {

        $file->delete();


        return response()->json(
            [
                __('Deleted Successfully'),
                ['file' => $file]
            ]
        );

        // return $this->respondWithErrors(
        //     __('delete_file_error')
        // );
    }
}
