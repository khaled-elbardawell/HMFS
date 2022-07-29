import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/home/controller.dart';
import 'package:hmfs/app/widgets/custom_navbar.dart';

class Home extends StatelessWidget {
  const Home({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    HomeController homeCtrl = Get.find<HomeController>();
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      body: Obx(() => homeCtrl.buildScreens[homeCtrl.selectedItemIndex.value]),
      bottomNavigationBar: const CustomNavbar(),
    );
  }
}
