import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class CustomAppBar extends StatelessWidget {
  final String appBarColor;
  final String title;
  final String titleColor;
  final String iconName1;
  final String iconSemantics1;
  final double iconSize;
  final String iconName2;
  final String iconSemantics2;
  final double bottomPadding;
  final double titleSize;
  final String colorIcon1;
  final String colorIcon2;

  const CustomAppBar({
    Key? key,
    required this.appBarColor,
    required this.title,
    required this.titleColor,
    this.colorIcon1 = '#8F9BB3',
    this.colorIcon2 = '#8F9BB3',
    this.iconName1 = '',
    this.iconSemantics1 = '',
    this.iconSize = 3.5,
    this.iconName2 = '',
    this.iconSemantics2 = '',
    this.bottomPadding = 13.0,
    this.titleSize = 20.0,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        color: HexColor.fromHex(appBarColor),
      ),
      child: Padding(
        padding: EdgeInsets.fromLTRB(6.0.wp, 13.0.wp, 6.0.wp, bottomPadding.wp),
        child: Row(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Text(
              title,
              style: TextStyle(
                fontSize: titleSize.sp,
                fontWeight: FontWeight.bold,
                color: HexColor.fromHex(titleColor),
              ),
            ),
            const Spacer(),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                if (iconName1 != '')
                  InkWell(
                    onTap: () {},
                    child: SvgPicture.asset(
                      iconName1,
                      semanticsLabel: iconSemantics1,
                      width: iconSize.wp,
                      height: iconSize.hp,
                      color: HexColor.fromHex(colorIcon1),
                    ),
                  ),
                SizedBox(
                  width: 7.0.wp,
                ),
                if (iconName2 != '')
                  InkWell(
                    onTap: () {},
                    child: SvgPicture.asset(
                      iconName2,
                      semanticsLabel: iconSemantics2,
                      width: iconSize.wp,
                      height: iconSize.hp,
                      color: HexColor.fromHex(colorIcon2),
                    ),
                  ),
              ],
            )
          ],
        ),
      ),
    );
  }
}
