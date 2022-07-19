import 'package:flutter/widgets.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/onboarding_data.dart';

import '../../data/services/storage/services.dart';

class OnboardingController extends GetxController {
  var selectedPageIndex = 0.obs;

  var pageController = PageController();

  bool get isLastPage => selectedPageIndex.value == onboardingPages.length - 1;

  forwardAction() {
    if (isLastPage) {
      CacheHelper.putOnboardingData(keyOnboarding, true);
      Get.offNamed('/SignIn');
    } else {
      pageController.nextPage(duration: 300.milliseconds, curve: Curves.easeIn);
    }
  }

  List<OnboardingData> onboardingPages = [
    OnboardingData(
      'Welcome',
      'to HMFS',
      'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
      'assets/images/onboarding1.png',
    ),
    OnboardingData(
      'Ask',
      'a Doctor Online',
      'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
      'assets/images/onboarding2.png',
    ),
    OnboardingData(
      'Physician',
      'on Your Doorstep',
      'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
      'assets/images/onboarding3.png',
    ),
  ];
}
