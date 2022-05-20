// ignore_for_file: avoid_print

import 'package:get/get.dart';

class UserProfileControllrer extends GetxController {
  @override
  void onInit() {
    super.onInit();
    print("onInit print");
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
}
