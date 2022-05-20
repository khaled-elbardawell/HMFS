import 'package:get/get.dart';
import 'package:hmfs/app/modules/reservation/controller.dart';

class ReservationBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => ReservationController(),
    );
  }
}
