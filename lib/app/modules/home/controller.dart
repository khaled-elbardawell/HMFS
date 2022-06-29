// ignore_for_file: avoid_print

import 'package:flutter/material.dart';

import 'package:get/state_manager.dart';
import 'package:hmfs/app/modules/doctors/view.dart';
import 'package:hmfs/app/modules/home/view.dart';
import 'package:hmfs/app/modules/chat/view.dart';
import 'package:hmfs/app/modules/reservation/view.dart';
import 'package:hmfs/app/modules/user_profile/view.dart';

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

  @override
  void onInit() {
    super.onInit();
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
}
