import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class UserDataCard extends StatelessWidget {
  final String imageName;
  final double imageSize;
  final bool isOnline;
  final String title;
  final String subTitle;
  final String titleColor;
  final String subTitleColor;
  final double titleSize;
  final double subTitleSize;
  const UserDataCard({
    Key? key,
    required this.imageName,
    required this.imageSize,
    required this.isOnline,
    required this.title,
    required this.subTitle,
    required this.titleColor,
    required this.subTitleColor,
    required this.titleSize,
    required this.subTitleSize,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.start,
      children: [
        ClipRRect(
          borderRadius: BorderRadius.circular(600.0),
          child: Image.asset(
            imageName,
            fit: BoxFit.fill,
            width: imageSize.wp,
            height: imageSize.wp,
          ),
        ),
        SizedBox(
          width: 4.0.wp,
        ),
        Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              title,
              style: TextStyle(
                fontSize: titleSize.sp,
                color: HexColor.fromHex(titleColor),
                fontWeight: FontWeight.bold,
              ),
            ),
            SizedBox(
              height: 0.5.hp,
            ),
            Text(
              subTitle,
              style: TextStyle(
                fontSize: subTitleSize.sp,
                color: HexColor.fromHex(subTitleColor),
                fontWeight: FontWeight.w500,
              ),
            ),
          ],
        ),
      ],
    );
  }
}
