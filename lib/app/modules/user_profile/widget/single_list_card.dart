import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class SingleListCard extends StatelessWidget {
  final String title;
  final String titleColor;
  final double titleSize;
  final String iconName;
  final String iconSemanticsLabel;
  const SingleListCard({
    Key? key,
    required this.title,
    required this.titleColor,
    required this.titleSize,
    required this.iconName,
    required this.iconSemanticsLabel,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Padding(
          padding: EdgeInsets.symmetric(vertical: 2.5.wp),
          child: ListTile(
            onTap: () {},
            contentPadding: const EdgeInsets.all(0.0),
            title: Text(
              title,
              style: TextStyle(
                fontSize: titleSize.sp,
                fontWeight: FontWeight.w600,
                color: HexColor.fromHex(titleColor),
              ),
            ),
            leading: Container(
              padding: EdgeInsets.all(2.0.wp),
              decoration: BoxDecoration(
                color: HexColor.fromHex('#6574CF').withOpacity(0.15),
                borderRadius: BorderRadius.circular(5.0),
              ),
              child: SvgPicture.asset(
                iconName,
                semanticsLabel: iconSemanticsLabel,
                color: HexColor.fromHex('#6574CF'),
                width: 4.5.wp,
                height: 4.5.hp,
              ),
            ),
            trailing: Icon(
              Icons.arrow_forward_ios_rounded,
              color: HexColor.fromHex('#8F9BB3'),
              size: 5.0.wp,
            ),
          ),
        ),
        Divider(
          thickness: 1.5,
          height: 0,
          color: HexColor.fromHex('#EDF1F7'),
        ),
      ],
    );
  }
}
