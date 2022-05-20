import 'package:get/instance_manager.dart';
import 'package:hmfs/app/modules/new_password/controller.dart';

class NewPasswordBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => NewPasswordController(),
    );
  }
}
