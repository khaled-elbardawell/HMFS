import 'package:get/instance_manager.dart';
import 'package:hmfs/app/modules/signin/controller.dart';

class SignInBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => SignInController(),
    );
  }
}
