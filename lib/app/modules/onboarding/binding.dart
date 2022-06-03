import 'package:get/get.dart';
import 'package:hmfs/app/modules/onboarding/controller.dart';

class OnboardingBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => OnboardingController(),
    );
  }
}
