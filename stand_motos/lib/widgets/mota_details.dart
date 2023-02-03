import 'package:cached_network_image/cached_network_image.dart';
import 'package:stand_motos/data_objects/mota.dart';
import 'package:stand_motos/globals.dart';
import 'package:flutter/material.dart';

class MotaDetails extends StatelessWidget {
  final Mota mota;

  const MotaDetails({required this.mota, super.key});

  @override
  Widget build(BuildContext context) {
    final String myUrl = "${Globals.baseUrl}${mota.img}";

    return Column(
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: [
        const SizedBox(
          height: 20,
        ),
        Text(
          mota.nome,
          textAlign: TextAlign.center,
          style: TextStyle(
            fontSize: 40,
            fontWeight: FontWeight.bold,
            color: Colors.red[50],
          ),
        ),
        const SizedBox(
          height: 20,
        ),
        CachedNetworkImage(
          imageUrl: myUrl,
          placeholder: (context, url) => const CircularProgressIndicator(),
          errorWidget: (context, url, error) => const Icon(Icons.error),
          height: 300,
        ),
        const SizedBox(height: 25, width: 10),
        Text(
          mota.desc,
          textAlign: TextAlign.center,
          style: const TextStyle(
            fontSize: 15,
            color: Colors.white,
          ),
        ),
        const SizedBox(height: 20),
        Text(
          textAlign: TextAlign.center,
          "€ ${mota.preco.toString()}",
          style: TextStyle(
            fontSize: 30,
            color: Colors.red[50],
          ),
        ),
      ],
    );
  }
}
