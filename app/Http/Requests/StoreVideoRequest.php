<?php

public function rules()
{
    return [
        'title' => 'required',
        'video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/x-matroska',
    ];
}