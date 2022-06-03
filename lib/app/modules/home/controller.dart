// ignore_for_file: avoid_print

import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';

import 'package:get/state_manager.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/doctors/view.dart';
import 'package:hmfs/app/modules/home/view.dart';
import 'package:hmfs/app/modules/messages/view.dart';
import 'package:hmfs/app/modules/reservation/view.dart';
import 'package:hmfs/app/modules/user_profile/view.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';

class HomeController extends GetxController {
  PersistentTabController bottomNavBarController =
      PersistentTabController(initialIndex: 0);

  final currentIndex = 0.obs;

  final selectedItemIndex = 0.obs;

  List<Widget> buildScreens = [
    const HomeScreen(),
    const MessagesScreen(),
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
