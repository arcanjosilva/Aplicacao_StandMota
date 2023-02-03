<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMarcaRequest;
use App\Http\Requests\NewMarcaRequest;
use App\Models\Mota;



use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();

        return view('marcas',['marcas'=>$marcas]);

    }

    public function show($id)
    {
        $marca = Marca::findorFail($id);
        return view('marcasdetalhes',['marca'=>$marca]);

    }

    public function create()
    {

        $motas = Mota::all();

        $user = auth()->user();

        $userMarcas=$user->motas;
        if($userMarcas->count()==10){
            return redirect('/home')->with('mssg','Não pode criar mais produtos');
        }
        return view('createMarca',['motas' => $motas]);
    }

    public function edit($id){
        $marcas = Marca::all();
        $marca = Marca::findOrFail($id);

        return view('createMarca', ['marca' => $marca, 'marcas' => $marcas]);
    }


    public function store(NewMarcaRequest $request)

    {
        $nome=request('nome');
        $bio=request('bio');
        // $img=request('img');
        $ranking=request('ranking');

        $img ="";
        if($request->has('img'))
        {
            $img = $request->file('img');

            $iname='prod'.'_'.time();
            $folder='/img/marcas/';
            $fileName= $iname.'.'.$img->getClientOriginalExtension();
            $filePath = $folder.$fileName;

            $img->storeAs($folder,$fileName,'public');
            $img = "/storage/".$filePath;
        }


        $marca = new Marca();

        $marca->nome=$nome;
        $marca->bio=$bio;
        $marca->img=$img;
        $marca ->ranking=$ranking;
        $marca->created_by_m = auth()->user()->id;

        $marca->save();

        return redirect('/marcas/create')->with('mssg','MARCA CRIADO');
    }


    public function update($id,EditMarcaRequest $request){
        $nome=request('nome');
        $bio=request('bio');
        $ranking=request('ranking');


        $changed = (request('changed') == 'true')?1:0;
        $marca= Marca::findOrFail($id);
        if($changed){
            $img ="";
            if($request->has('img'))
            {
                $img = $request->file('img');

                $iname='prod'.'_'.time();
                $folder='/img/marcas/';
                $fileName= $iname.'.'.$img->getClientOriginalExtension();
                $filePath = $folder.$fileName;

                $img->storeAs($folder,$fileName,'public');
                $img = "/storage/".$filePath;
            }
            $marca->img =$img;
        }

        $marca->nome=$nome;
        $marca->bio=$bio;
        $marca->ranking=$ranking;



         $marca->save();

         return redirect("/marcas/$id")->with('mssg','Marca Criado');
    }

    public function destroy($id)

    {
        $marca = Marca::findOrFail($id);
        $marca->delete();

        return redirect('/marcas');
    }
}
