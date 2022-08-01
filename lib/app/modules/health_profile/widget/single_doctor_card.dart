import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/data/models/healthprofile.dart';
import 'package:hmfs/app/modules/health_profile/controller.dart';

class SingleDoctorCard extends StatelessWidget {
  final HealthProfileDoctor doctor;
  HealthProfileController healthProfileCtrl =
      Get.find<HealthProfileController>();
  SingleDoctorCard({Key? key, required this.doctor}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.symmetric(vertical: 2.0.wp, horizontal: 0.5.wp),
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
          children: [
            Row(
              crossAxisAlignment: CrossAxisAlignment.start,
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
                  width: 4.0.wp,
                ),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
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
                      doctor.email,
                      style: TextStyle(
                        fontSize: 8.5.sp,
                        color: HexColor.fromHex(lightBlue),
                        fontWeight: FontWeight.w400,
                      ),
                    ),
                    SizedBox(
                      height: 1.5.hp,
                    ),
                    TextButton.icon(
                      icon: Icon(
                        Icons.message_outlined,
                        color: HexColor.fromHex(blue),
                        size: 18.0,
                      ),
                      onPressed: () {
                        healthProfileCtrl.createChat();
                      },
                      label: Text(
                        'Send Message',
                        style: TextStyle(
                          fontSize: 16.0,
                          color: HexColor.fromHex(blue),
                          fontWeight: FontWeight.w400,
                        ),
                      ),
                    ),
                  ],
                ),
                const Spacer(),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.end,
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.start,
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        SvgPicture.asset(
                          'assets/images/Icon-star-blue.svg',
                          semanticsLabel: 'star Icon',
                          width: 2.2.wp,
                          height: 2.2.hp,
                          color: HexColor.fromHex(blue),
                        ),
                        SizedBox(
                          width: 0.8.wp,
                        ),
                        Text(
                          "4.7",
                          style: TextStyle(
                            fontSize: 11.5.sp,
                            color: HexColor.fromHex(blue),
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 0.6.hp,
                    ),
                    Text(
                      "(12)",
                      style: TextStyle(
                        fontSize: 9.0.sp,
                        color: HexColor.fromHex(lightBlue),
                        fontWeight: FontWeight.w400,
                      ),
                    ),
                  ],
                ),
              ],
            ),
            // Row(
            //   mainAxisAlignment: MainAxisAlignment.end,
            //   crossAxisAlignment: CrossAxisAlignment.center,
            //   children: [
            //     SvgPicture.asset(
            //       'assets/images/Icon-calendar.svg',
            //       semanticsLabel: 'calendar Icon',
            //       width: 3.3.wp,
            //       height: 3.3.hp,
            //     ),
            //     SizedBox(
            //       width: 4.5.wp,
            //     ),
            //     SvgPicture.asset(
            //       'assets/images/Icon-chat.svg',
            //       semanticsLabel: 'chat Icon',
            //       width: 3.3.wp,
            //       height: 3.3.hp,
            //     ),
            //   ],
            // ),
          ],
        ),
      ),
    );
  }
}
