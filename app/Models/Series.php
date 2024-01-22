<?php

namespace App\Models;

use App\Services\TagService;

class Series extends VideoTypeModel
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function getContentType(): string
    {
        return TagService::CONTENT_TYPE_SERIES;
    }
}
