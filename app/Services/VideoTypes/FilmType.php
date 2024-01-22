<?php
namespace App\Services\VideoTypes;

use App\Models\Film;
use App\Services\TagService;

class FilmType extends GenericVideoType
{
    /**
     * @return Film
     */
    public function newInstance(): Film
    {
        return new Film();
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return TagService::CONTENT_TYPE_FILM;
    }
}
