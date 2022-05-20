import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/modules/home/controller.dart';

import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';

class BottomNavigation extends StatelessWidget {
  BottomNavigation({Key? key}) : super(key: key);
  final homeCtrl = Get.find<HomeController>();

  @override
  Widget build(BuildContext context) {
    return PersistentTabView(
      context,
      screens: homeCtrl.buildScreens,
      controller: homeCtrl.bottomNavBarController,
      items: homeCtrl.navBarsItems,
      navBarStyle: NavBarStyle.style3,
    );
  }
}
