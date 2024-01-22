<?php

namespace App\Models;

use App\Services\TagService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Podcast extends VideoTypeModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function getContentType(): string
    {
        return TagService::CONTENT_TYPE_PODCAST;
    }
}
