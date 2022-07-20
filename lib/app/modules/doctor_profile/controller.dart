// ignore_for_file: avoid_print

import 'package:flutter/foundation.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/doctor.dart';
import 'package:hmfs/app/data/services/storage/services.dart';
import '../../data/services/doctorapi/repository.dart';

class DoctorProfileController extends GetxController {
  RxBool requesting = false.obs;
  late Doctor doctor;
  final DoctorRepository doctorRepository;

  DoctorProfileController({required this.doctorRepository});

  @override
  void onInit() {
    super.onInit();
    print("parameters" + Get.parameters["doctorId"].toString());
    getUserDoctor();
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

  void getUserDoctor() {
    var token = CacheHelper.getTokenData(keyToken);
    var doctorId = Get.parameters["doctorId"] ?? '1';
    doctorRepository.getUserDoctor(token, doctorId).then((value) {
      doctor = value!;
      requesting.value = true;
      if (kDebugMode) {
        print('Successful login! ' + doctor.toString());
      }
    });
  }
}
