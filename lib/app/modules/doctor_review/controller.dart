// ignore_for_file: avoid_print

import 'package:get/get.dart';

class DoctorReviewController extends GetxController {
  var totalRate = 1.0.obs;
  var waitTimeRate = 1.0.obs;
  var bedsideRate = 1.0.obs;
  var consultingeRate = 1.0.obs;

  void changeWaitTimeRate(double rate) {
    waitTimeRate.value = rate;
    changTotalRate();
  }

  void changeBedsideRate(double rate) {
    bedsideRate.value = rate;
    changTotalRate();
  }

  void changeConsultingeRate(double rate) {
    consultingeRate.value = rate;
    changTotalRate();
  }

  void changTotalRate() {
    var rate =
        (waitTimeRate.value + bedsideRate.value + consultingeRate.value) / 3;
    totalRate.value = double.parse((rate).toStringAsFixed(1));
  }

  @override
  void onInit() {
    super.onInit();
    print("onInit print rajab");
  }

  @override
  void onReady() {
    print("onReady print");
    print("rajjjjjjjjjab");
    super.onReady();
  }

  @override
  void onClose() {
    print("onClose print");
    super.onClose();
  }
}
