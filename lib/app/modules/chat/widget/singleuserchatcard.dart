import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/utils/key.dart';

class SingleUserChatCard extends StatelessWidget {
  final dynamic image;
  final String name;
  final int userId;
  final dynamic lastMessage;
  final String updatedAt;

  const SingleUserChatCard({
    Key? key,
    required this.image,
    required this.name,
    required this.userId,
    required this.lastMessage,
    required this.updatedAt,
  }) : super(key: key);

  String daysBetween(String updatedAt) {
    DateTime to = DateTime.now();
    DateTime from = DateTime.parse(updatedAt);
    if (to.difference(from).inDays != 0) {
      return "${to.difference(from).inDays.toString()} days";
    } else if (to.difference(from).inHours != 0) {
      return "inHours ${to.difference(from).inHours.toString()} hours";
    } else if (to.difference(from).inMinutes != 0) {
      return "inMinutes ${to.difference(from).inMinutes.toString()} minutes";
    } else if (to.difference(from).inSeconds != 0) {
      return "inSeconds ${to.difference(from).inSeconds.toString()} seconds";
    } else {
      return "Now";
    }
  }

  @override
  Widget build(BuildContext context) {
    return ListTile(
      onTap: () {
        Get.toNamed('/SingleChat', arguments: {
          "userId": userId.toString(),
          "name": name,
        });
      },
      contentPadding:
          EdgeInsets.symmetric(vertical: 2.0.wp, horizontal: 6.0.wp),
      shape: Border(
        bottom: BorderSide(
          color: HexColor.fromHex('#EDF1F7'),
          width: 1.5,
        ),
      ),
      // leading: ClipRRect(
      //   borderRadius: BorderRadius.circular(80.0),
      //   child: image == null
      //       ? Image.asset(
      //           "assets/images/user-assets.png",
      //           fit: BoxFit.fill,
      //           width: 15.0.wp,
      //           height: 15.0.wp,
      //         )
      //       : Image.network(
      //           '$baseUrl/upload/images/full/${image}',
      //           fit: BoxFit.fill,
      //           width: 15.0.wp,
      //           height: 15.0.wp,
      //         ),
      // ),
      title: Text(
        name,
        style: TextStyle(
          fontSize: 12.5.sp,
          color: HexColor.fromHex('#222B45'),
          fontWeight: FontWeight.bold,
        ),
      ),
      subtitle: Text(
        lastMessage ?? '',
        style: TextStyle(
          fontSize: 10.0.sp,
          color: HexColor.fromHex('#8F9BB3'),
          fontWeight: FontWeight.normal,
        ),
        maxLines: 1,
        overflow: TextOverflow.ellipsis,
      ),
      trailing: Text(
        daysBetween(updatedAt),
        style: TextStyle(
          fontSize: 10.5.sp,
          color: HexColor.fromHex('#8F9BB3'),
          fontWeight: FontWeight.normal,
        ),
      ),
    );
  }
}
