import 'package:get/get.dart';
import 'package:hmfs/app/modules/user_profile/controller.dart';

import '../../data/providers/userprofile/provider.dart';
import '../../data/services/userprofile/repository.dart';

class UserProfileBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => UserProfileController(
        userProfileRepository: UserProfileRepository(
          userProfileProvider: UserProfileProvider(),
        ),
      ),
    );
  }
}
