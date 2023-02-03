import 'dart:convert';
import 'package:stand_motos/data_objects/mota.dart';
import 'package:stand_motos/globals.dart';
import 'package:http/http.dart' as http;

class StandMotosService {
  List<Mota> motas = [];
  int motaId = 0;
  late Mota currentMota;

  Future<void> getMotas() async {
    var url = Uri.parse("${Globals.apiUrl}/motas");
    var respose = await http.get(url);

    motas.clear();
    List<dynamic> returnedMotas = jsonDecode(respose.body);
    for (var returnedMota in returnedMotas) {
      Mota m = Mota(
        id: returnedMota['id'],
        nome: returnedMota['nome'],
        desc: returnedMota['desc'],
        img: returnedMota['img'],
        preco: returnedMota['preco'],
      );
      motas.add(m);
    }
  }

  Future<void> getCurrentMota() async {
    var url = Uri.parse("${Globals.apiUrl}/motas/$motaId");
    var respose = await http.get(url);

    //motas.clear();
    var returnedMota = jsonDecode(respose.body);

    currentMota = Mota(
      id: returnedMota['id'],
      nome: returnedMota['nome'],
      desc: returnedMota['desc'],
      img: returnedMota['img'],
      preco: returnedMota['preco'],
    );
  }
}
