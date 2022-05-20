import 'package:get/get.dart';
import 'package:hmfs/app/modules/doctor_review/controller.dart';

class DoctorReviewBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => DoctorReviewController(),
    );
  }
}
