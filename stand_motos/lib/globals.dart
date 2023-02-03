import 'package:stand_motos/services/stand_motos_service.dart';

class Globals {
  static StandMotosService service = StandMotosService();
  static String baseUrl = 'http://127.0.0.1:8000';
  static String apiUrl = "$baseUrl/api";
  static String nextRoute = "/Motas";
}
