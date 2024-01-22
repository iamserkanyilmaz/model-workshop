<?php
namespace App\Services;

use App\Models\Tag;

class TagService
{

    CONST CONTENT_TYPE_PODCAST = 'podcast';
    CONST CONTENT_TYPE_FILM = 'film';
    CONST CONTENT_TYPE_SERIES = 'series';

    /**
     * @param array $dataArr
     * @return void
     */
    public function sync(array $dataArr): void
    {
        $user = auth()->user();
        $postTagData = array_map('trim', explode(',', $dataArr['tags']));

        $tags = Tag::query()->where('content_type', '=', $dataArr['content_type'])
            ->where('content_id', '=', $dataArr['content_id'])
            ->where('user_type_id', '=', $user->user_type_id)
            ->get();

        foreach ($tags as $tag) {
            if (!in_array($tag['name'], $postTagData)){
                $tag->delete();
            }
        }

        $tags = array_map(function($item){
            return $item['name'];
        }, $tags->toArray());

        $diffTags = array_diff($postTagData, $tags);
        foreach ($diffTags as $key => $value) {
            $tag = new Tag();
            $tag->content_type = $dataArr['content_type'];
            $tag->content_id = $dataArr['content_id'];
            $tag->name = $value;
            $tag->user_type_id = $user->user_type_id;
            $tag->save();
        }
    }
}
