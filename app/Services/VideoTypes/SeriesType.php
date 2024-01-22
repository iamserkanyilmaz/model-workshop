<?php
namespace App\Services\VideoTypes;

use App\Models\Series;
use App\Services\TagService;

class SeriesType extends GenericVideoType
{
    /**
     * @return Series
     */
    public function newInstance(): Series
    {
        return new Series();
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return TagService::CONTENT_TYPE_SERIES;
    }
}
