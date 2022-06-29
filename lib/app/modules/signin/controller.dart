import 'package:flutter/material.dart';
import 'package:get/get.dart';
import '../../data/services/api/repository.dart';

class SignInController extends GetxController {
  final formKey = GlobalKey<FormState>();
  final emailController = TextEditingController();
  final passwordController = TextEditingController();
  final UserRepository userRepository;
  SignInController({required this.userRepository});

  void loginUser() {
    userRepository
        .loginUser(emailController.text, passwordController.text)
        .then((value) {
      if (value.status == true) {
        // print(value.data.email);
        Get.offAllNamed('/home');
      }
    });
  }
}
