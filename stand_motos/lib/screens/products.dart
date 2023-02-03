import 'package:stand_motos/globals.dart';
import 'package:stand_motos/widgets/mota_card.dart';
import 'package:flutter/material.dart';

class Motas extends StatefulWidget {
  const Motas({super.key});

  @override
  State<Motas> createState() => _MotasState();
}

class _MotasState extends State<Motas> {
  void showDetails(int motaId) {
    Globals.service.motaId = motaId;
    Navigator.pushNamed(context, '/LoadDetails');
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color.fromARGB(255, 70, 66, 66),
      appBar: AppBar(
        title: const Text("Motas"),
        backgroundColor: Colors.lightBlue[800],
      ),
      body: Column(
        children: [
          Expanded(
            child: ListView.builder(
              itemCount: Globals.service.motas.length,
              itemBuilder: (context, index) => MotaCard(
                mota: Globals.service.motas[index],
                showDetails: (() {
                  showDetails(Globals.service.motas[index].id);
                }),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
