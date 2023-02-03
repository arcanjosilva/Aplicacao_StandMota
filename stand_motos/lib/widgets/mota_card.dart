import 'package:stand_motos/data_objects/mota.dart';
import 'package:stand_motos/globals.dart';
import 'package:flutter/material.dart';

class MotaCard extends StatelessWidget {
  final Mota mota;
  final Function() showDetails;

  const MotaCard({
    required this.mota,
    required this.showDetails,
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    final String myUrl = "${Globals.baseUrl}${mota.img}";

    return Card(
      margin: const EdgeInsets.all(10),
      child: ListTile(
        title: Text(
          textAlign: TextAlign.center,
          "${mota.nome} ${mota.preco}",
          style: TextStyle(
            fontSize: 30,
            fontWeight: FontWeight.bold,
            color: Colors.green[800],
          ),
        ),
        leading: CircleAvatar(
          backgroundImage: NetworkImage(myUrl),
        ),
        onTap: showDetails,
      ),
    );
  }
}
