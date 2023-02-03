<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mota;
use App\Models\Marca;


class ApiController extends Controller
{
  public function index()
  {
    return Mota::all();
  }

  public function show($id)
  {
    return Mota::find($id);
  }

  public function indexMarca()
  {
    return Marca::all();
  }

  public function showMarca($id){
    return Marca::find($id);
  }


}
