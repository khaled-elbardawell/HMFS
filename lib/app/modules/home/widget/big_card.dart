import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class BigCard extends StatelessWidget {
  final String iconanme;
  final String semanticsLabel;
  final String title;
  final String subTitle;
  final String color;

  const BigCard({
    Key? key,
    required this.iconanme,
    required this.title,
    required this.subTitle,
    required this.color,
    required this.semanticsLabel,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.all(4.0.wp),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(5),
        boxShadow: [BoxShadow(color: Colors.grey[300]!, blurRadius: 1)],
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Container(
                padding: EdgeInsets.all(4.0.wp),
                decoration: BoxDecoration(
                  color: HexColor.fromHex(color).withOpacity(0.08),
                  borderRadius: BorderRadius.circular(5),
                ),
                child: SvgPicture.asset(
                  iconanme,
                  semanticsLabel: semanticsLabel,
                  width: 10.0.wp,
                  height: 5.0.hp,
                ),
              ),
              SizedBox(
                width: 5.0.wp,
              ),
              Column(
                mainAxisAlignment: MainAxisAlignment.start,
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    title,
                    style: TextStyle(
                      fontSize: 14.0.sp,
                      color: HexColor.fromHex("#222B45"),
                      fontWeight: FontWeight.w500,
                    ),
                  ),
                  SizedBox(
                    height: 1.0.hp,
                  ),
                  Text(
                    subTitle,
                    style: TextStyle(
                      fontSize: 12.0.sp,
                      color: HexColor.fromHex("#8F9BB3"),
                      fontWeight: FontWeight.w300,
                    ),
                  ),
                ],
              ),
            ],
          ),
          SizedBox(
            height: 6.0.hp,
          ),
          Text(
            "87",
            style: TextStyle(
              fontSize: 24.0.sp,
              fontWeight: FontWeight.bold,
              color: HexColor.fromHex("#222B45"),
            ),
            textAlign: TextAlign.center,
          )
        ],
      ),
    );
  }
}
