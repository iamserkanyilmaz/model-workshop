<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class VideoTypeModel extends Model
{
    abstract function getContentType(): string;

    protected function getTagsAttribute(): array
    {
        $tags = Tag::query()
            ->where('user_type_id', '=', auth()->user()->user_type_id)
            ->where('content_id', '=', $this->id)
            ->where('content_type', '=', $this->getContentType())
            ->get()
            ->toArray();
        return $tags;
    }
}
