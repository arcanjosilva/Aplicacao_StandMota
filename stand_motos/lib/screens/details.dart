import 'package:stand_motos/globals.dart';
import 'package:stand_motos/widgets/mota_details.dart';
import 'package:flutter/material.dart';

class Details extends StatefulWidget {
  const Details({super.key});

  @override
  State<Details> createState() => _DetailsState();
}

class _DetailsState extends State<Details> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color.fromARGB(255, 70, 66, 66),
      appBar: AppBar(
        title: const Text("Motas"),
        backgroundColor: Colors.lightBlue[800],
      ),
      body: Column(children: [
        Expanded(
            child: MotaDetails(
          mota: Globals.service.currentMota,
        ))
      ]),
    );
  }
}
