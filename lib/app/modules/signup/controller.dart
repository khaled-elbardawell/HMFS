import 'package:flutter/cupertino.dart';
import 'package:get/state_manager.dart';

class SignUpController extends GetxController {
  final signUpformKey = GlobalKey<FormState>();
  final emailController = TextEditingController();
  final passwordController = TextEditingController();
  final mobilephoneController = TextEditingController();
  final nameController = TextEditingController();
}
