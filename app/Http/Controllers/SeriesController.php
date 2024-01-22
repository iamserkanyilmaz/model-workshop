<?php

namespace App\Http\Controllers;

use App\DataTables\SeriesDataTable;
use App\Services\VideoTypes\SeriesType;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * @var SeriesType
     */
    private SeriesType $seriesService;

    /**
     * @param SeriesType $seriesService
     */
    public function __construct(SeriesType $seriesService)
    {
        $this->seriesService = $seriesService;
    }

    public function postCreate(Request $request)
    {
        $id = $this->seriesService->create($request->all());
        return redirect()->route('series.edit.get', ['id' => $id]);
    }

    public function getCreate(Request $request)
    {
        return view('series.create');
    }

    public function getEdit(Request $request, $id){
        $data = $this->seriesService->get($id);;
        return view('series.edit', $data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->seriesService->update($id, $request->all());
        $data = $this->seriesService->get($id);
        return view('series.edit', $data);
    }

    public function list(SeriesDataTable $dataTable)
    {
        return $dataTable->render('series.list');
    }
}
