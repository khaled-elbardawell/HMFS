import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class SingleGridDoctor extends StatelessWidget {
  const SingleGridDoctor({Key? key}) : super(key: key);

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
            Stack(
              alignment: AlignmentDirectional.bottomEnd,
              children: [
                ClipRRect(
                  borderRadius: BorderRadius.circular(600.0),
                  child: Image.asset(
                    "assets/images/doctor-avatar.jpg",
                    fit: BoxFit.fill,
                    width: 20.0.wp,
                    height: 20.0.wp,
                  ),
                ),
                Positioned(
                  right: 1.5.wp,
                  bottom: 1.0.wp,
                  child: SvgPicture.asset(
                    'assets/images/Icon-online.svg',
                    semanticsLabel: 'location Icon',
                    width: 2.0.wp,
                    height: 2.0.hp,
                  ),
                ),
              ],
            ),
            SizedBox(
              height: 2.5.hp,
            ),
            Text(
              "Chikanso Chima",
              style: TextStyle(
                fontSize: 12.5.sp,
                color: HexColor.fromHex('#222B45'),
                fontWeight: FontWeight.bold,
              ),
            ),
            SizedBox(
              height: 0.5.hp,
            ),
            Text(
              "Ophthalmologist",
              style: TextStyle(
                fontSize: 10.0.sp,
                color: HexColor.fromHex('#8F9BB3'),
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
                SvgPicture.asset(
                  'assets/images/Icon-location.svg',
                  semanticsLabel: 'location Icon',
                  width: 2.0.wp,
                  height: 2.0.hp,
                ),
                SizedBox(
                  width: 1.5.wp,
                ),
                Text(
                  "68km away",
                  style: TextStyle(
                    fontSize: 8.5.sp,
                    color: HexColor.fromHex('#8F9BB3'),
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
                Row(
                  children: [
                    SvgPicture.asset(
                      'assets/images/Icon-calendar.svg',
                      semanticsLabel: 'calendar Icon',
                      width: 3.3.wp,
                      height: 3.3.hp,
                    ),
                    SizedBox(
                      width: 5.5.wp,
                    ),
                    SvgPicture.asset(
                      'assets/images/Icon-chat.svg',
                      semanticsLabel: 'chat Icon',
                      width: 3.3.wp,
                      height: 3.3.hp,
                    ),
                  ],
                ),
                const Spacer(),
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
                            ),
                            SizedBox(
                              width: 0.8.wp,
                            ),
                            Text(
                              "4.7",
                              style: TextStyle(
                                fontSize: 11.0.sp,
                                color: HexColor.fromHex('#6574CF'),
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ],
                        ),
                        Text(
                          "(12)",
                          style: TextStyle(
                            fontSize: 8.0.sp,
                            color: HexColor.fromHex('#8F9BB3'),
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
