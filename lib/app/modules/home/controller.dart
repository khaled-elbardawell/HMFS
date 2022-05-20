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

  List<Widget> buildScreens = [
    const HomeScreen(),
    const MessagesScreen(),
    DoctorsScreen(),
    const ReservationScreen(),
    const UserProfileScreen(),
  ];

  List<PersistentBottomNavBarItem> navBarsItems = [
    PersistentBottomNavBarItem(
      icon: SvgPicture.asset(
        "assets/images/Icon-home-active.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      inactiveIcon: SvgPicture.asset(
        "assets/images/Icon-home-unactive.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      activeColorPrimary: HexColor.fromHex('#6574CF'),
    ),
    PersistentBottomNavBarItem(
      icon: SvgPicture.asset(
        "assets/images/Icon-message-active.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      inactiveIcon: SvgPicture.asset(
        "assets/images/Icon-message-unactive.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      activeColorPrimary: HexColor.fromHex('#6574CF'),
    ),
    PersistentBottomNavBarItem(
      icon: SvgPicture.asset(
        "assets/images/Icon-doctors-active.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      inactiveIcon: SvgPicture.asset(
        "assets/images/Icon-doctors-unactive.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      activeColorPrimary: HexColor.fromHex('#6574CF'),
    ),
    PersistentBottomNavBarItem(
      icon: SvgPicture.asset(
        "assets/images/Icon-reservation-active.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      inactiveIcon: SvgPicture.asset(
        "assets/images/Icon-reservation-unactive.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      activeColorPrimary: HexColor.fromHex('#6574CF'),
    ),
    PersistentBottomNavBarItem(
      icon: SvgPicture.asset(
        "assets/images/Icon-userprofile-active.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      inactiveIcon: SvgPicture.asset(
        "assets/images/Icon-userprofile-unactive.svg",
        semanticsLabel: "semanticsLabel",
        width: 30.0,
        height: 30.0,
      ),
      activeColorPrimary: HexColor.fromHex('#6574CF'),
    ),
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
