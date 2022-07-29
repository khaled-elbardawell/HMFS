import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../core/utils/key.dart';
import '../../data/services/storage/services.dart';
import '../../data/services/userapi/repository.dart';

class SignUpController extends GetxController {
  final signUpformKey = GlobalKey<FormState>();
  final emailController = TextEditingController();
  final passwordController = TextEditingController();
  final nameController = TextEditingController();

  final UserRepository userRepository;

  SignUpController({required this.userRepository});

  @override
  void onClose() {
    emailController.clear();
    passwordController.clear();
    nameController.clear();

    super.onClose();
  }

  void registerUser() {
    userRepository
        .registerUser(
            emailController.text, nameController.text, passwordController.text)
        .then((value) {
      user = value!;
      CacheHelper.putTokenData(keyToken, value.data.tokenDetails.accessToken);
      if (kDebugMode) {
        print('Successful SignUp! ' + user.data.email);
      }
      if (kDebugMode) {
        print(CacheHelper.getTokenData(keyToken));
      }
      Get.offAllNamed('/home');
      Get.snackbar(
        'Success',
        'SignUp Success',
        backgroundColor: Colors.white,
        colorText: Colors.black,
      );
    });
  }
}
