import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/data/models/doctor.dart';

class SingleGridDoctor extends StatelessWidget {
  final Doctor doctor;
  const SingleGridDoctor({Key? key, required this.doctor}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.symmetric(horizontal: 0.5.wp),
      child: Container(
        padding: EdgeInsets.symmetric(
          vertical: 3.7.wp,
          horizontal: 3.0.wp,
        ),
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(5.0),
          boxShadow: [BoxShadow(color: Colors.grey[300]!, blurRadius: 1)],
        ),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          mainAxisAlignment: MainAxisAlignment.start,
          children: [
            ClipRRect(
              borderRadius: BorderRadius.circular(600.0),
              child: Image.asset(
                "assets/images/user-assets.png",
                fit: BoxFit.fill,
                width: 20.0.wp,
                height: 20.0.wp,
              ),
            ),
            SizedBox(
              height: 2.5.hp,
            ),
            Text(
              "Dr.${doctor.name}",
              style: TextStyle(
                fontSize: 12.5.sp,
                color: HexColor.fromHex(darkBlue),
                fontWeight: FontWeight.bold,
              ),
            ),
            SizedBox(
              height: 0.5.hp,
            ),
            Text(
              doctor.phone,
              style: TextStyle(
                fontSize: 10.0.sp,
                color: HexColor.fromHex(lightBlue),
                fontWeight: FontWeight.w500,
              ),
            ),
            SizedBox(
              height: 1.5.hp,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                Icon(
                  Icons.email_outlined,
                  color: HexColor.fromHex(lightBlue),
                  size: 18.0,
                ),
                SizedBox(
                  width: 1.5.wp,
                ),
                Text(
                  doctor.email,
                  style: TextStyle(
                    fontSize: 8.5.sp,
                    color: HexColor.fromHex(lightBlue),
                    fontWeight: FontWeight.w400,
                  ),
                ),
              ],
            ),
            SizedBox(
              height: 2.2.hp,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                // SvgPicture.asset(
                //   'assets/images/Icon-chat.svg',
                //   semanticsLabel: 'chat Icon',
                //   width: 3.3.wp,
                //   height: 3.3.hp,
                // ),
                // const Spacer(),
                Row(
                  children: [
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        Row(
                          mainAxisAlignment: MainAxisAlignment.start,
                          crossAxisAlignment: CrossAxisAlignment.center,
                          children: [
                            SvgPicture.asset(
                              'assets/images/Icon-star-blue.svg',
                              semanticsLabel: 'star Icon',
                              width: 2.0.wp,
                              height: 2.0.hp,
                              color: HexColor.fromHex(blue),
                            ),
                            SizedBox(
                              width: 0.8.wp,
                            ),
                            Text(
                              "4.7",
                              style: TextStyle(
                                fontSize: 11.0.sp,
                                color: HexColor.fromHex(blue),
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ],
                        ),
                        Text(
                          "(12)",
                          style: TextStyle(
                            fontSize: 8.0.sp,
                            color: HexColor.fromHex(lightBlue),
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
