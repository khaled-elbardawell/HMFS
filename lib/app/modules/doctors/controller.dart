// ignore_for_file: avoid_print

import 'package:get/get.dart';

class DoctorsController extends GetxController {
  final gridView = false.obs;

  void changeViewDoctorList() {
    gridView.value = !gridView.value;
    print("ttitt ${gridView.value}");
    print("fewfwfewfewfwef");
  }

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
