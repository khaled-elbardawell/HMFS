// ignore_for_file: avoid_print

import 'package:flutter/material.dart';

import 'package:get/state_manager.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/reservation.dart';
import 'package:hmfs/app/data/services/reservationapi/repository.dart';
import 'package:hmfs/app/modules/doctors/view.dart';
import 'package:hmfs/app/modules/home/view.dart';
import 'package:hmfs/app/modules/chat/view.dart';
import 'package:hmfs/app/modules/reservation/view.dart';
import 'package:hmfs/app/modules/user_profile/view.dart';

import '../../data/services/storage/services.dart';
import '../../data/services/userapi/repository.dart';

class HomeController extends GetxController {
  final currentIndex = 0.obs;

  final selectedItemIndex = 0.obs;

  List<Widget> buildScreens = [
    const HomeScreen(),
    const ChatScreen(),
    const DoctorsScreen(),
    const ReservationScreen(),
    const UserProfileScreen(),
  ];
  RxBool requesting = false.obs;
  List<Reservation> upcomingReservationData = [];

  List<Reservation> previousReservationData = [];

  final UserRepository userRepository;
  final ReservationRepository reservationRepository;
  HomeController(
      {required this.reservationRepository, required this.userRepository});

  void meUser() {
    String token = CacheHelper.getTokenData(keyToken);
    print('token is: $token');
    userRepository.meUser(token).then((value) {
      user = value!;
      print('me user! ' + user.data.tokenDetails.accessToken);
    });
  }

  @override
  void onInit() {
    super.onInit();
    // getUpcomingReservation();
    getPreviousReservation();
    meUser();
    print("onInit print home");
  }

  @override
  void onReady() {
    print("onReady print");

    super.onReady();
  }

  @override
  void onClose() {
    print("onClose print");
    currentIndex.value = 0;
    selectedItemIndex.value = 0;
    super.onClose();
  }

  void getUpcomingReservation() {
    String token = CacheHelper.getTokenData(keyToken);
    print('init token is : $token');
    reservationRepository.getUserUpcomingReservations(token).then((value) {
      upcomingReservationData = value;
      requesting.value = true;
    });
  }

  void getPreviousReservation() {
    String token = CacheHelper.getTokenData(keyToken);
    print('token is: $token');
    reservationRepository.getUserPreviousReservations(token).then((value) {
      previousReservationData = value;

      requesting.value = true;
    });
  }
}
