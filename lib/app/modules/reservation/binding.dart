import 'package:get/get.dart';
import 'package:hmfs/app/modules/reservation/controller.dart';

import '../../data/providers/reservation/provider.dart';
import '../../data/services/reservationapi/repository.dart';

class ReservationBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => ReservationController(
        reservationRepository: ReservationRepository(
          reservationProvider: ReservationProvider(),
        ),
      ),
    );
  }
}
