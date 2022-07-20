// ignore_for_file: avoid_print

import 'package:get/get.dart';
import 'package:hmfs/app/data/models/reservation.dart';
import 'package:hmfs/app/data/services/reservationapi/repository.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../core/utils/key.dart';

class ReservationController extends GetxController {
  RxBool requesting = false.obs;
  List<Reservation> upcomingReservationData = [];
  List<Reservation> previousReservationData = [];
  final ReservationRepository reservationRepository;

  ReservationController({required this.reservationRepository});

  @override
  void onInit() {
    super.onInit();
    getUpcomingReservation();
    getPreviousReservation();
    print("onInit print");
  }

  @override
  void onReady() {
    print("onReady print");
    super.onReady();
  }

  @override
  void onClose() {
    print("onClose print");
    super.onClose();
  }

  void sortTime(List<Reservation> reservation) {
    reservation.sort((a, b) {
      var now = DateTime.now();
      var outputFormatA =
          DateTime.parse('${a.reservationDate} ${a.reservationTime}');
      var differenceA = outputFormatA.difference(now).inDays;
      var outputFormatB =
          DateTime.parse('${b.reservationDate} ${b.reservationTime}');
      var differenceB = outputFormatB.difference(now).inDays;
      return differenceA.compareTo(differenceB);
    });
  }

  void getUpcomingReservation() {
    String token = CacheHelper.getTokenData(keyToken);
    print('token is: $token');
    reservationRepository.getUserUpcomingReservations(token).then((value) {
      upcomingReservationData = value;
      sortTime(upcomingReservationData);
      requesting.value = true;
    });
  }

  void getPreviousReservation() {
    String token = CacheHelper.getTokenData(keyToken);
    print('token is: $token');
    reservationRepository.getUserPreviousReservations(token).then((value) {
      previousReservationData = value;
      sortTime(previousReservationData);
      requesting.value = true;
    });
  }
}
