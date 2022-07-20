import 'package:get/get.dart';
import 'package:hmfs/app/data/providers/doctor/provider.dart';
import 'package:hmfs/app/data/services/doctorapi/repository.dart';
import 'package:hmfs/app/data/services/userapi/repository.dart';
import 'package:hmfs/app/modules/chat/controller.dart';
import 'package:hmfs/app/modules/doctor_profile/controller.dart';
import 'package:hmfs/app/modules/doctor_review/controller.dart';
import 'package:hmfs/app/modules/doctors/controller.dart';
import 'package:hmfs/app/modules/home/controller.dart';
import 'package:hmfs/app/modules/new_password/controller.dart';
import 'package:hmfs/app/modules/reservation/controller.dart';
import 'package:hmfs/app/modules/reset_password/controller.dart';
import 'package:hmfs/app/modules/signin/controller.dart';
import 'package:hmfs/app/modules/signup/controller.dart';
import 'package:hmfs/app/modules/user_profile/controller.dart';

import 'data/providers/reservation/provider.dart';
import 'data/providers/user/provider.dart';
import 'data/services/reservationapi/repository.dart';
import 'modules/onboarding/controller.dart';
import 'modules/single_chat/binding.dart';

class Binding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => HomeController(
        userRepository: UserRepository(
          userProvider: UserProvider(),
        ),
      ),
    );
    Get.lazyPut(
      () => DoctorsController(
        doctorRepository: DoctorRepository(
          doctorProvider: DoctorProvider(),
        ),
      ),
    );
    Get.lazyPut(
      () => DoctorProfileController(
        doctorRepository: DoctorRepository(
          doctorProvider: DoctorProvider(),
        ),
      ),
    );
    Get.lazyPut(
      () => DoctorReviewController(),
    );
    Get.lazyPut(
      () => ReservationController(
        reservationRepository: ReservationRepository(
          reservationProvider: ReservationProvider(),
        ),
      ),
    );
    Get.lazyPut(
      () => UserProfileController(),
    );
    Get.lazyPut(
      () => SignInController(
        userRepository: UserRepository(
          userProvider: UserProvider(),
        ),
      ),
    );
    Get.lazyPut(
      () => SignUpController(
        userRepository: UserRepository(
          userProvider: UserProvider(),
        ),
      ),
    );
    Get.lazyPut(
      () => ResetPasswordController(),
    );
    Get.lazyPut(
      () => NewPasswordController(),
    );
    Get.lazyPut(
      () => OnboardingController(),
    );
    Get.lazyPut(
      () => ChatController(),
    );
    Get.lazyPut(
      () => SingleChatBinding(),
    );
  }
}
