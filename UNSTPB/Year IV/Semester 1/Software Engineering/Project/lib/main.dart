import 'package:flutter/material.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_core/firebase_core.dart';
import 'firebase_options.dart';

void main() async{
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp(options: DefaultFirebaseOptions.currentPlatform);
  runApp(SmartTrashBinApp());
}

class SmartTrashBinApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Smart Trash Bin',
      theme: ThemeData(
        primaryColor: Color(0xFF45DFB1), // Inspired by the teal palette
        scaffoldBackgroundColor: Color(0xFFE9F5DB), // Light green background
        elevatedButtonTheme: ElevatedButtonThemeData(
          style: ElevatedButton.styleFrom(
            backgroundColor: Color(0xFF06D6A0), // Button color from the palette
            foregroundColor: Colors.white, // Button text color
            padding: EdgeInsets.symmetric(horizontal: 30, vertical: 15),
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(20),
            ),
          ),
        ),
        textTheme: TextTheme(
          headline4: TextStyle(
            fontSize: 28,
            fontWeight: FontWeight.bold,
            color: Color(0xFF213A57), // Dark teal for headings
          ),
          bodyText1: TextStyle(
            fontSize: 18,
            color: Color(0xFF718355), // Green shade for body text
          ),
        ),
      ),
      home: LoginPage(),
    );
  }
}

class LoginPage extends StatefulWidget {
  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final _emailController = TextEditingController();
  final _passwordController = TextEditingController();

  final _auth = FirebaseAuth.instance;

  void _login() async {
      try {
        // Sign in with Firebase Authentication
        UserCredential userCredential = await _auth.signInWithEmailAndPassword(
          email: _emailController.text,
          password: _passwordController.text
        );

        // If successful, navigate to the HomePage
        Navigator.push(
          context,
          MaterialPageRoute(
            builder: (context) =>
                HomePage(username: userCredential.user!.email!),
          ),
        );
      } on FirebaseAuthException catch (e) {
        String errorMessage;
      if (e.code == 'user-not-found') {
        errorMessage = 'No user found for this email.';
      } else if (e.code == 'wrong-password') {
        errorMessage = 'Wrong password provided.';
      } else {
        errorMessage = 'An error occurred: ${e.message}';
      }
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text(errorMessage)),
      );
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('An unexpected error occurred: $e')),
      );
    }
  }
  
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Smart Trash Bin Login'),
        backgroundColor: Color(0xFF0B6477),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Form(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text(
                'Welcome to Smart Trash Bin',
                style: Theme.of(context).textTheme.headline4,
              ),
              SizedBox(height: 20),
              TextFormField(
                controller: _emailController,
                decoration: InputDecoration(
                  labelText: 'Email',
                  border: UnderlineInputBorder(), // Underline border
                  focusedBorder: UnderlineInputBorder(
                    borderSide:
                        BorderSide(color: Color(0xFF0B6477)), // Focus color
                  ),
                ),
                validator: (value) =>
                    value!.isEmpty ? 'Please enter your email' : null,
                keyboardType: TextInputType.emailAddress,
              ),
              SizedBox(height: 20),
              TextFormField(
                controller: _passwordController,
                decoration: InputDecoration(
                  labelText: 'Password',
                  border: UnderlineInputBorder(), // Underline border
                  focusedBorder: UnderlineInputBorder(
                    borderSide:
                        BorderSide(color: Color(0xFF0B6477)), // Focus color
                  ),
                ),
                obscureText: true,
                validator: (value) =>
                    value!.isEmpty ? 'Please enter your password' : null,
              ),
              SizedBox(height: 30),
              ElevatedButton(
                onPressed: _login,
                child: Text('Login'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

class HomePage extends StatefulWidget {
  final String username;

  HomePage({required this.username});

  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  int fullness = 0; // Fullness levels: 0, 50, 100

  void _increaseFullness() {
    setState(() {
      if (fullness < 100) fullness += 50;
    });
  }

  void _resetFullness() {
    setState(() {
      fullness = 0;
    });
  }

  String getGarbageImage() {
    if (fullness == 0) {
      return 'assets/images/happy.png'; // Happy garbage image
    } else if (fullness == 50) {
      return 'assets/images/neutral.png'; // Neutral garbage image
    } else {
      return 'assets/images/sad.png'; // Sad garbage image
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Smart Trash Bin'),
        backgroundColor: Color(0xFF0B6477),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              'Welcome, ${widget.username}!',
              style: Theme.of(context).textTheme.headline4,
            ),
            SizedBox(height: 30),
            Text(
              'Trash Fullness: $fullness%',
              style: Theme.of(context).textTheme.bodyText1,
            ),
            SizedBox(height: 20),
            Image.asset(
              getGarbageImage(),
              height: 150,
              width: 150,
            ),
            SizedBox(height: 30),
            ElevatedButton(
              onPressed: _increaseFullness,
              child: Text('Add Trash'),
            ),
            SizedBox(height: 10),
            ElevatedButton(
              onPressed: _resetFullness,
              style: ElevatedButton.styleFrom(
                backgroundColor:
                    Color(0xFFEF476F), // Red shade for "Empty Trash"
              ),
              child: Text('Empty Trash'),
            ),
          ],
        ),
      ),
    );
  }
}

class AuthService {
  final FirebaseAuth _auth = FirebaseAuth.instance;

  // Sign in with email and password
  Future<UserCredential> signIn(String email, String password) async {
    return await _auth.signInWithEmailAndPassword(
        email: email, password: password);
  }

  // Register with email and password
  Future<UserCredential> register(String email, String password) async {
    return await _auth.createUserWithEmailAndPassword(
        email: email, password: password);
  }
}