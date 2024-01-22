<?php

namespace App\Http\Controllers;

use App\DataTables\FilmsDataTable;
use App\Services\VideoTypes\FilmType;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    private FilmType $filmService;

    /**
     * @param FilmType $filmService
     */
    public function __construct(FilmType $filmService)
    {
        $this->filmService = $filmService;
    }

    public function postCreate(Request $request)
    {
        $id = $this->filmService->create($request->all());
        return redirect()->route('film.edit.get', ['id' => $id]);
    }

    public function getCreate(Request $request)
    {
        return view('film.create');
    }

    public function getEdit(Request $request, $id){
        $data = $this->filmService->get($id);;
        return view('film.edit', $data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->filmService->update($id, $request->all());
        $data = $this->filmService->get($id);
        return view('film.edit', $data);
    }

    public function list(FilmsDataTable $dataTable)
    {
        return $dataTable->render('film.list');
    }
}
