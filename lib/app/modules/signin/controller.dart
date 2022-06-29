import 'package:flutter/cupertino.dart';
import 'package:get/get.dart';
import 'package:get/state_manager.dart';

import '../../data/models/user.dart';
import '../../data/providers/user/provider.dart';
import '../../data/services/api/repository.dart';

class SignInController extends GetxController {
  final formKey = GlobalKey<FormState>();
  final emailController = TextEditingController();
  final passwordController = TextEditingController();
  final UserRepository userRepository;
  SignInController({required this.userRepository});

  void loginUser() {
    print('wewewe');
    userRepository
        .loginUser(emailController.text, passwordController.text)
        .then((value) {
      if (value.status == true) {
        print(value.data.email);
        Get.offAllNamed('/home');
      }
    });
  }
}
