import 'package:stand_motos/globals.dart';
import 'package:stand_motos/screens/details.dart';
import 'package:stand_motos/screens/loading.dart';
import 'package:stand_motos/screens/products.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(MaterialApp(
    initialRoute: '/',
    routes: {
      '/': (context) => const Loading(),
      '/Motas': (context) => const Motas(),
      '/Details': (context) => const Details(),
      '/LoadDetails': (context) {
        Globals.nextRoute = '/Details';
        return const Loading();
      }
    },
  ));
}
