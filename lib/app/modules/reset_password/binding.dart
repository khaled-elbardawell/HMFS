import 'package:get/instance_manager.dart';
import 'package:hmfs/app/modules/reset_password/controller.dart';

class ResetPasswordBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => ResetPasswordController(),
    );
  }
}
