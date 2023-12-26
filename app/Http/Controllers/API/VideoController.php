<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForDownloading;
use App\Jobs\ConvertVideoForStreaming;
use App\Video;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    public function store(StoreVideoRequest $request): JsonResponse
    {
        try {
            $video = Video::create([
                'disk'          => 'videos_disk',
                'original_name' => $request->video->getClientOriginalName(),
                'path'          => $request->video->store('videos', 'videos_disk'),
                'title'         => $request->title,
            ]);

            $this->dispatch(new ConvertVideoForDownloading($video));
            $this->dispatch(new ConvertVideoForStreaming($video));

            return response()->json([
                'id' => $video->id,
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to store video'], 500);
        }
    }
}
