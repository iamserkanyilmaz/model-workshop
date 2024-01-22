<?php
namespace App\Services\VideoTypes;

use App\Services\TagService;

abstract class GenericVideoType implements VideoType
{
    /**
     * @var TagService
     */
    private TagService $tagService;

    /**
     * @var object|mixed
     */
    private object $videoType;

    /**
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
        $this->videoType = $this->newInstance();
    }

    /**
     * @param array $dataArr
     * @return int
     */
    public function create(array $dataArr): int
    {
        $videoType = $this->videoType->newInstance();
        $videoType->name = $dataArr['name'];
        $videoType->save();

        $dataArr = [
            'tags' => $dataArr['tags'],
            'content_id' => $videoType->id,
            'content_type' => $this->getContentType()
        ];

        $this->tagService->sync($dataArr);

        return $videoType->id;
    }

    /**
     * @param int $id
     * @return array
     */
    public function get(int $id): array
    {
        $videoType = $this->videoType->newQuery()->whereId($id)->first();
        $data = array_map(function ($item){
            return $item['name'];
        },$videoType->tags);
        $tags = implode(',',$data);
        return ['videoType' => $videoType, 'tags' => $tags];
    }


    /**
     * @param int $id
     * @param array $dataArr
     * @return void
     */
    public function update(int $id, array $dataArr): void
    {
        $videoType = $this->videoType->newQuery()->whereId($id)->first();
        $videoType->name = $dataArr['name'];
        $videoType->save();

        $dataArr = [
            'tags' => $dataArr['tags'],
            'content_id' => $videoType->id,
            'content_type' => $this->getContentType()
        ];

        $this->tagService->sync($dataArr);
    }

    /**
     * @return mixed
     */
    abstract function newInstance(): mixed;

    /**
     * @return string
     */
    abstract function getContentType(): string;
}
