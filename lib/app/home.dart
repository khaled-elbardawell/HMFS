import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/home/controller.dart';
import 'package:hmfs/app/widgets/custom_navbar.dart';

class Home extends GetView<HomeController> {
  const Home({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      body: Obx(
          () => controller.buildScreens[controller.selectedItemIndex.value]),
      bottomNavigationBar: CustomNavbar(),
    );
  }
}
