import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

AppBar customAppBar(
  String title,
  String backgroundColor,
  String textColor,
  IconData icon,
  Function onPressed,
) {
  return AppBar(
    centerTitle: true,
    backgroundColor: HexColor.fromHex(backgroundColor),
    elevation: 0.0,
    title: Text(
      title,
      style: TextStyle(
        fontSize: 18.0.sp,
        fontWeight: FontWeight.bold,
        color: HexColor.fromHex(textColor),
      ),
    ),
    actions: [
      IconButton(
        icon: Icon(
          icon,
          color: HexColor.fromHex(textColor),
          size: 30.0,
        ),
        onPressed: () => Get.toNamed('/SearchScreen'),
      ),
    ],
  );
}
