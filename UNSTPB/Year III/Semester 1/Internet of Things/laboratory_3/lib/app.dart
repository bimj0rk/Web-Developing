import 'package:flutter/material.dart';
import 'products.dart';

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Homework 2',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: Product(),
    );
  }
}