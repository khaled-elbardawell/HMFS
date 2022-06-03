import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

import '../modules/home/controller.dart';

class CustomNavbar extends StatelessWidget {
  CustomNavbar({Key? key}) : super(key: key);
  final homeCtrl = Get.find<HomeController>();

  @override
  Widget build(BuildContext context) {
    return Row(
      children: [
        customNavbarItem(
            context, 0, "assets/images/Icon-home-active.svg", 'Home Icon'),
        customNavbarItem(
            context, 1, "assets/images/Icon-message-active.svg", 'Home Icon'),
        customNavbarItem(
            context, 2, "assets/images/Icon-doctors-active.svg", 'Home Icon'),
        customNavbarItem(context, 3,
            "assets/images/Icon-reservation-active.svg", 'Home Icon'),
        customNavbarItem(context, 4,
            "assets/images/Icon-userprofile-active.svg", 'Home Icon'),
      ],
    );
  }

  GestureDetector customNavbarItem(
      BuildContext context, int index, String image, String semanticsLabel) {
    return GestureDetector(
        onTap: () {
          homeCtrl.selectedItemIndex.value = index;
        },
        child: Obx(
          () => Container(
            padding: const EdgeInsets.all(13),
            height: 60,
            width: MediaQuery.of(context).size.width / 5,
            decoration: homeCtrl.selectedItemIndex.value == index
                ? activeBoxDecorationItem()
                : unActiveBoxDecorationItem(),
            child: SvgPicture.asset(
              image,
              semanticsLabel: semanticsLabel,
              alignment: Alignment.center,
              fit: BoxFit.contain,
              color: homeCtrl.selectedItemIndex.value == index
                  ? HexColor.fromHex('#6574CF')
                  : Colors.grey,
            ),
          ),
        ));
  }

  BoxDecoration activeBoxDecorationItem() {
    return BoxDecoration(
      border: Border(
        top: BorderSide(
          width: 3.0,
          color: HexColor.fromHex('#6574CF'),
        ),
      ),
      color: Colors.white,
    );
  }

  BoxDecoration unActiveBoxDecorationItem() {
    return const BoxDecoration(
      border: Border(
        top: BorderSide(width: 3.0, color: Colors.white),
      ),
      color: Colors.white,
    );
  }
}
