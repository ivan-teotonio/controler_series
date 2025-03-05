<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();   
        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series'))->with('mensagem', $mensagem);
       
    }

    public function create()
    {

        return view('series.create');
    }

    public function store(Request $request)
    {
       //dd($request->all());
        Serie::create($request->all());
        $request->session()->flash('mensagem', "Série {$request->name} criada com sucesso!");
        return redirect()->route('series.index');
    }

    public function destroy(Request $request)
    {
       // dd($request->series);
        Serie::destroy($request->series);
        $request->session()->flash('mensagem', "Série removida com sucesso!");
        return redirect()->route('series.index');
    }
}
