import 'package:get/instance_manager.dart';
import 'package:hmfs/app/modules/signup/controller.dart';

import '../../data/providers/user/provider.dart';
import '../../data/services/userapi/repository.dart';

class SignUpBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => SignUpController(
        userRepository: UserRepository(
          userProvider: UserProvider(),
        ),
      ),
    );
  }
}
