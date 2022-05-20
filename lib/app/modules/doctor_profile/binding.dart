import 'package:get/get.dart';
import 'package:hmfs/app/modules/doctor_profile/controller.dart';

class DoctorProfileBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => DoctorProfileController(),
    );
  }
}
