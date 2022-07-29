import 'package:get/get.dart';
import 'package:hmfs/app/data/providers/reservation/provider.dart';
import 'package:hmfs/app/data/services/reservationapi/repository.dart';
import 'package:hmfs/app/modules/home/controller.dart';

import '../../data/providers/user/provider.dart';
import '../../data/services/userapi/repository.dart';

class HomeBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => HomeController(
        userRepository: UserRepository(
          userProvider: UserProvider(),
        ),
        reservationRepository: ReservationRepository(
          reservationProvider: ReservationProvider(),
        ),
      ),
    );
  }
}
