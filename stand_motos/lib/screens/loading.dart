import 'package:stand_motos/globals.dart';
import 'package:flutter/material.dart';
import 'package:flutter_spinkit/flutter_spinkit.dart';

class Loading extends StatefulWidget {
  const Loading({super.key});

  @override
  State<Loading> createState() => _LoadingState();
}

class _LoadingState extends State<Loading> {
  void setupService() async {
    if (Globals.nextRoute == "/Motas") {
      await Globals.service.getMotas();
    } else if (Globals.nextRoute == "/Details") {
      await Globals.service.getCurrentMota();
    }
    finishLoading();
  }

  void finishLoading() {
    Navigator.pushReplacementNamed(context, Globals.nextRoute);
  }

  @override
  void initState() {
    super.initState();
    setupService();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color.fromARGB(255, 70, 66, 66),
      body: const Center(
        child: SpinKitCircle(
          color: Colors.red,
          size: 100,
        ),
      ),
    );
  }
}
