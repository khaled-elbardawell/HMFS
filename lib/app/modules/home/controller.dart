// ignore_for_file: avoid_print

import 'package:flutter/material.dart';

import 'package:get/state_manager.dart';
import 'package:hmfs/app/core/utils/key.dart';
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
    DoctorsScreen(),
    const ReservationScreen(),
    const UserProfileScreen(),
  ];

  final UserRepository userRepository;

  HomeController({required this.userRepository});

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
    super.onClose();
  }
}
