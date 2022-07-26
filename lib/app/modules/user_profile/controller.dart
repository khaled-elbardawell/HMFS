// ignore_for_file: avoid_print

import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/data/models/userprofile.dart';

import '../../core/utils/key.dart';
import '../../data/services/storage/services.dart';
import '../../data/services/userprofile/repository.dart';

class UserProfileController extends GetxController {
  late UserProfile userProfile;
  RxBool requesting = false.obs;
  final UserProfileRepository userProfileRepository;

  UserProfileController({required this.userProfileRepository});

  void getUserProfile() {
    String token = CacheHelper.getTokenData(keyToken);
    userProfileRepository.getUserProfileData(token).then((value) {
      userProfile = value!;
      requesting.value = true;
      if (kDebugMode) {
        print('Successful login! ' + userProfile.data.email);
      }
    });
  }

  @override
  void onInit() {
    getUserProfile();
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
