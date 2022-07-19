import 'package:get/get.dart';
import 'package:hmfs/app/modules/user_profile/controller.dart';

class UserProfileBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => UserProfileController(),
    );
  }
}
