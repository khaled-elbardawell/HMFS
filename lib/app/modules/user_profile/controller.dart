// ignore_for_file: avoid_print

import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../core/utils/key.dart';
import '../../data/services/storage/services.dart';

class UserProfileController extends GetxController {
  @override
  void onInit() {
    super.onInit();

    print("onInit print user");
  }

  @override
  void onReady() {
    print("onReady print");
    super.onReady();
  }

  @override
  void onClose() {
    print("onClose print");
    super.onClose();
  }

  // void registerUser() {
  //   userRepository.meUser(CacheHelper.getTokenData(keyToken)).then((value) {
  //     user = value!;
  //     CacheHelper.putTokenData(keyToken, value.data.tokenDetails.accessToken);
  //     print('Successful SignUp! ' + user.data.email);
  //     print(CacheHelper.getTokenData(keyToken));
  //     Get.offAllNamed('/home');
  //     Get.snackbar(
  //       'Success',
  //       'SignUp Success',
  //       backgroundColor: Colors.white,
  //       colorText: Colors.black,
  //     );
  //   });
  // }

  void logout() {
    CacheHelper.deleteData(keyToken).then(
      (value) {
        Get.snackbar(
          'Success',
          'Logout Success',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
        Get.toNamed('/SignIn');
      },
    );
  }
}
