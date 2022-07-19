import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/widgets/user_data_card.dart';

class SingleCardReservation extends StatelessWidget {
  const SingleCardReservation({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.symmetric(vertical: 5.5.wp, horizontal: 4.0.wp),
      margin: EdgeInsets.symmetric(vertical: 2.0.wp, horizontal: 0.5.wp),
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(5),
        color: HexColor.fromHex(white),
        boxShadow: [BoxShadow(color: Colors.grey[300]!, blurRadius: 1)],
      ),
      child: Column(
        children: [
          const UserDataCard(
            imageName: "assets/images/doctor-avatar.jpg",
            imageSize: 18.0,
            isOnline: true,
            title: "Rajab Aabed",
            titleColor: darkBlue,
            titleSize: 12.5,
            subTitle: "Ophthalmologist",
            subTitleSize: 10.0,
            subTitleColor: lightBlue,
          ),
          SizedBox(
            height: 0.5.hp,
          ),
          Row(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              TextButton(
                style: const ButtonStyle(
                  splashFactory: NoSplash.splashFactory,
                ),
                onPressed: () {
                  Get.toNamed('/doctorProfile');
                },
                child: Text(
                  "Visit Profile",
                  style: TextStyle(
                    color: HexColor.fromHex(blue),
                    fontSize: 12.0.sp,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              const Spacer(),
              Row(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  SvgPicture.asset(
                    'assets/images/Icon-clock.svg',
                    semanticsLabel: 'clock Icon',
                    width: 3.3.wp,
                    height: 3.3.hp,
                    color: HexColor.fromHex(lightBlue),
                  ),
                  SizedBox(
                    width: 1.5.wp,
                  ),
                  Text(
                    '1 hour',
                    style: TextStyle(
                      color: HexColor.fromHex(lightBlue),
                      fontSize: 11.0.sp,
                      fontWeight: FontWeight.w500,
                    ),
                  ),
                ],
              ),
            ],
          ),
          Divider(
            thickness: 1.8,
            indent: 1,
            endIndent: 1,
            color: HexColor.fromHex(grey),
          ),
          Row(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    "In 5 days",
                    style: TextStyle(
                      color: HexColor.fromHex(lightBlue),
                      fontSize: 11.5.sp,
                    ),
                  ),
                  SizedBox(
                    height: 0.5.hp,
                  ),
                  Text(
                    "12 May, 12:50 AM",
                    style: TextStyle(
                      color: HexColor.fromHex(darkBlue),
                      fontSize: 13.0.sp,
                      fontWeight: FontWeight.w600,
                    ),
                  ),
                ],
              ),
              const Spacer(),
              InkWell(
                onTap: () {
                  // TODO: single chat for doctor
                  Get.toNamed('/SingleChat');
                },
                child: Container(
                  padding: EdgeInsets.all(1.7.wp),
                  decoration: BoxDecoration(
                    color: HexColor.fromHex(blue).withOpacity(0.27),
                    border: Border.all(
                      color: HexColor.fromHex(blue),
                      width: 1.5,
                    ),
                    borderRadius: BorderRadius.circular(6),
                  ),
                  child: SvgPicture.asset(
                    'assets/images/Icon-chat.svg',
                    semanticsLabel: 'Location Icon',
                    width: 3.2.wp,
                    height: 3.2.hp,
                    color: HexColor.fromHex(blue),
                  ),
                ),
              ),
            ],
          ),
        ],
      ),
    );
  }
}
