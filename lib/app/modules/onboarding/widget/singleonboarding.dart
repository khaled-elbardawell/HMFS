import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';

class SingleOnboarding extends StatelessWidget {
  final String title;
  final String subTitle;
  final String paragraph;
  final String image;

  const SingleOnboarding({
    Key? key,
    required this.title,
    required this.subTitle,
    required this.paragraph,
    required this.image,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        SizedBox(
          width: double.infinity,
          child: Text(
            title,
            style: TextStyle(
              color: HexColor.fromHex(blue),
              fontSize: 20.0.sp,
              fontWeight: FontWeight.normal,
            ),
          ),
        ),
        SizedBox(
          height: 1.0.hp,
        ),
        SizedBox(
          width: double.infinity,
          child: Text(
            subTitle,
            style: TextStyle(
              color: HexColor.fromHex(darkBlue),
              fontSize: 20.0.sp,
              fontWeight: FontWeight.normal,
            ),
          ),
        ),
        SizedBox(
          height: 1.5.hp,
        ),
        Text(
          paragraph,
          style: TextStyle(
            color: HexColor.fromHex(lightBlue),
            fontSize: 11.0.sp,
            fontWeight: FontWeight.normal,
            height: 1.4,
          ),
        ),
        SizedBox(
          height: 3.5.hp,
        ),
        Image.asset(
          image,
          fit: BoxFit.fill,
          alignment: Alignment.center,
          // width: 80.0.wp,
        ),
      ],
    );
  }
}
