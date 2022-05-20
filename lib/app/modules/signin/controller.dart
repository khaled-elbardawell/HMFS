import 'package:flutter/cupertino.dart';
import 'package:get/state_manager.dart';

class SignInController extends GetxController {
  final formKey = GlobalKey<FormState>();
  final emailController = TextEditingController();
  final passwordController = TextEditingController();
}
