import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/home/controller.dart';
import 'package:hmfs/app/widgets/custom_navbar.dart';

class Home extends StatelessWidget {
  Home({Key? key}) : super(key: key);
  final homeCtrl = Get.put(HomeController());
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex('#F7F9FC'),
      body: Obx(() => homeCtrl.buildScreens[homeCtrl.selectedItemIndex.value]),
      bottomNavigationBar: CustomNavbar(),
    );
  }
}
