import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/data/services/storage/services.dart';
import '../../core/utils/key.dart';
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
      user = value!;
      CacheHelper.putTokenData(keyToken, value.data.tokenDetails.accessToken);
      if (kDebugMode) {
        print('Successful login! ' + user.data.email);
      }
      Get.offAllNamed('/home');
      Get.snackbar(
        'Success',
        'Login Success',
        backgroundColor: Colors.white,
        colorText: Colors.black,
      );
    });
  }
}
