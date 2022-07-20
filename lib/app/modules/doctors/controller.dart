// ignore_for_file: avoid_print

import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/doctor.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../data/services/doctorapi/repository.dart';

class DoctorsController extends GetxController {
  RxBool requesting = false.obs;
  List<Doctor> doctors = [];
  final gridView = false.obs;
  final DoctorRepository doctorRepository;

  DoctorsController({required this.doctorRepository});

  void changeViewDoctorList() {
    gridView.value = !gridView.value;
  }

  @override
  void onInit() {
    super.onInit();
    getUserDoctors();
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

  void getUserDoctors() {
    String token = CacheHelper.getTokenData(keyToken);
    print('token is: $token');
    doctorRepository.getUserDoctors(token).then((value) {
      doctors = value;
      requesting.value = true;
    });
  }
}
