import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class SingleInfoCard extends StatelessWidget {
  final String iconanme;
  final String semanticsLabel;
  final String title;

  const SingleInfoCard(
      {Key? key,
      required this.iconanme,
      required this.semanticsLabel,
      required this.title})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.symmetric(horizontal: 6.5.wp),
      child: Container(
        padding: EdgeInsets.all(4.0.wp),
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(5),
          boxShadow: [
            BoxShadow(
              color: Colors.grey[300]!,
              blurRadius: 1,
            ),
          ],
        ),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            SvgPicture.asset(
              iconanme,
              semanticsLabel: semanticsLabel,
              width: 4.9.wp,
              height: 4.9.hp,
            ),
            SizedBox(
              width: 5.0.wp,
            ),
            Container(
              height: 7.0.hp,
              width: 2.0,
              color: HexColor.fromHex('#EDF1F7'),
            ),
            SizedBox(
              width: 5.0.wp,
            ),
            Text(
              title,
              style: TextStyle(
                fontSize: 14.0.sp,
                color: HexColor.fromHex('#222B45'),
                fontWeight: FontWeight.w500,
              ),
            ),
            const Spacer(),
            SvgPicture.asset(
              'assets/images/Icon-arrow-right.svg',
              semanticsLabel: 'Arrow Right Icon',
              width: 4.7.wp,
              height: 4.7.hp,
            ),
          ],
        ),
      ),
    );
  }
}
