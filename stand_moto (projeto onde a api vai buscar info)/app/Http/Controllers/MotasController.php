<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMotaRequest;
use App\Http\Requests\NewMotaRequest;
use Illuminate\Http\Request;
use App\Models\Mota;
use App\Models\Marca;

use App\Models\motas_marcas;

class MotasController extends Controller
{
    // public function root()
    // {
    //     return view('welcome')
    // }

    public function contacto()
    {
        return view('contactos');
    }


    public function index()
    {
        $marcas = Marca::all();

        $motas = Mota::all();
        return view('motas',['motas'=>$motas, 'marcas' => $marcas]);

    }

    public function show($id)
    {
        $mota = Mota::findorFail($id);
        return view('motasdetalhes',['mota'=>$mota]);

    }
    public function create()
    {
        $marcas = Marca::all();

        $user = auth()->user();
        $userMotas=$user->motas;
        if($userMotas->count()==10){
            return redirect('/home')->with('mssg','Não pode criar mais produtos');
        }
        return view('createMota',['marcas' => $marcas]);
    }


    public function edit($id){
        $marcas = Marca::all();
        $mota = Mota::findOrFail($id);

        return view('createMota', ['mota' => $mota, 'marcas' => $marcas]);
    }


    public function store(NewMotaRequest $request)

    {
        $validateData = $request->validate([
            'nome'=>'required',
            'img' =>'required|image|mimes:png,jpg,jpeg,gif|max:2048'
        ]);

        $nome=request('nome');
        $desc=request('desc');
        // $img=request('img');
        $preco=request('preco');
        $tipo = request('tipoMarca');

        $img ="";
        if($request->has('img'))
        {
            $img = $request->file('img');

            $iname='prod'.'_'.time();
            $folder='/img/motas/';
            $fileName= $iname.'.'.$img->getClientOriginalExtension();
            $filePath = $folder.$fileName;

            $img->storeAs($folder,$fileName,'public');
            $img = "/storage/".$filePath;
        }

        $mota = new Mota();

        $mota->nome=$nome;
        $mota->desc=$desc;
        $mota->img=$img;
        $mota ->preco=$preco;
        $mota->created_by = auth()->user()->id;

        $mota->save();

        return redirect('/motas/create')->with('mssg','MOTA CRIADO');
    }


    public function update($id,EditMotaRequest $request){

        $nome = request('nome');
        $desc = request('desc');
        $preco = request('preco');
        $tipo = request('tipoMarca');

        $changed = (request('changed') == 'true')?1:0;
        $mota = Mota::findOrFail($id);
        if($changed){
            $img ="";
            if($request->has('img'))
            {
                $img = $request->file('img');

                $iname='prod'.'_'.time();
                $folder='/img/motas/';
                $fileName= $iname.'.'.$img->getClientOriginalExtension();
                $filePath = $folder.$fileName;

                $img->storeAs($folder,$fileName,'public');
                $img = "/storage/".$filePath;
            }
            $mota->img =$img;
        }

        $mota->nome=$nome;
        $mota->desc=$desc;
        $mota ->preco=$preco;

         $mota->save();

         return redirect("/motas/$id")->with('mssg','Produto Criado');
    }



    public function estiloMota($id){
        $marcas = Marca::all();
        $marca = Marca::findOrFail($id);
        $motas = $marca->motas;
        return view('motas', ['motas'=>$motas, 'marcas'=> $marcas,  'actMarca' => $id]);
    }


    public function destroy($id)
    {
        $mota = Mota::findOrFail($id);
        $mota->delete();

        return redirect('/motas');
    }





    public function search(Request $request)
{
    $marcas = Marca::all();
    $motas = Mota::where('nome', 'LIKE', "%".$request->search."%")->orderBy('preco',$request->order)->get();

    return view('motas',['motas'=>$motas, 'marcas' => $marcas]);

}

public function randommotas(){
    $motas= Mota::inRandomOrder()->limit(4)->get();
    return view("welcome",['motas'=>$motas]);
}




}
