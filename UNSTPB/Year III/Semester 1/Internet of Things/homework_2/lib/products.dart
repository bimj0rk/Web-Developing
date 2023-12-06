import 'package:flutter/material.dart';

class Product extends StatefulWidget {
  @override
  _ProductState createState() => _ProductState();
}

class _ProductState extends State<Product> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Products'),
      ),

      body: Center(
        child: Column(
          children: <Widget>[
            Image.network(
              'https://upload.wikimedia.org/wikipedia/uk/f/f6/Kendrick_Lamar_-_To_Pimp_a_Butterfly.png',
              height: 300,
              width: 300,
            ),
            Text('To Pimp a Butterfly - Kendrick Lamar'),

            Image.network(
              'https://upload.wikimedia.org/wikipedia/en/c/ce/KendrickLamarGKMCDeluxe.jpg',
              height: 300,
              width: 300,
            ),
            Text('Good Kid, M.A.A.D City - Kendrick Lamar'),
          ],
        )
      ),   
    ); 
  }
}