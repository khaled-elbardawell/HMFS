import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class SingleUserChatCard extends StatelessWidget {
  const SingleUserChatCard({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListTile(
      onTap: () {
        Get.toNamed('/SingleChat', arguments: 'name user');
      },
      contentPadding:
          EdgeInsets.symmetric(vertical: 2.0.wp, horizontal: 6.0.wp),
      shape: Border(
        bottom: BorderSide(
          color: HexColor.fromHex('#EDF1F7'),
          width: 1.5,
        ),
      ),
      leading: ClipRRect(
        borderRadius: BorderRadius.circular(80.0),
        child: Image.asset(
          "assets/images/doctor-avatar.jpg",
          fit: BoxFit.fill,
          width: 15.0.wp,
          height: 15.0.wp,
        ),
      ),
      title: Text(
        "Chikanso Chima",
        style: TextStyle(
          fontSize: 12.5.sp,
          color: HexColor.fromHex('#222B45'),
          fontWeight: FontWeight.bold,
        ),
      ),
      subtitle: Text(
        "This short story the magic pot This short story the magic pot This short story the magic pot",
        style: TextStyle(
          fontSize: 10.0.sp,
          color: HexColor.fromHex('#8F9BB3'),
          fontWeight: FontWeight.normal,
        ),
        maxLines: 1,
        overflow: TextOverflow.ellipsis,
      ),
      trailing: Text(
        "1 min",
        style: TextStyle(
          fontSize: 10.5.sp,
          color: HexColor.fromHex('#8F9BB3'),
          fontWeight: FontWeight.normal,
        ),
      ),
    );
  }
}
