<?php
namespace App\Services\VideoTypes;

use App\Models\Film;
use App\Models\Podcast;
use App\Services\TagService;

class PodcastType extends GenericVideoType
{
    /**
     * @return Podcast
     */
    public function newInstance(): Podcast
    {
        return new Podcast();
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return TagService::CONTENT_TYPE_PODCAST;
    }
}
