import 'package:get/get.dart';
import 'package:hmfs/app/modules/doctors/controller.dart';

class DoctorBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => DoctorsController(),
    );
  }
}
