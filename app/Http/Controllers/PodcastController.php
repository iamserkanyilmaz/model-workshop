<?php

namespace App\Http\Controllers;

use App\DataTables\PodcastsDataTable;
use App\Services\VideoTypes\PodcastType;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * @var PodcastType
     */
    private PodcastType $podcastService;

    /**
     * @param PodcastType $podcastService
     */
    public function __construct(PodcastType $podcastService)
    {
        $this->podcastService = $podcastService;
    }

    public function postCreate(Request $request)
    {
        $id = $this->podcastService->create($request->all());
        return redirect()->route('podcast.edit.get', ['id' => $id]);
    }

    public function getCreate(Request $request)
    {
        return view('podcast.create');
    }

    public function getEdit(Request $request, $id){
        $data = $this->podcastService->get($id);;
        return view('podcast.edit', $data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->podcastService->update($id, $request->all());
        $data = $this->podcastService->get($id);
        return view('podcast.edit', $data);
    }

    public function list(PodcastsDataTable $dataTable)
    {
        return $dataTable->render('podcast.list');
    }
}
