import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/data/models/doctor.dart';

class ProfileCard extends StatelessWidget {
  final Doctor doctor;
  const ProfileCard({Key? key, required this.doctor}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.all(6.5.wp),
      decoration: const BoxDecoration(
        color: Colors.white,
      ),
      child: Column(
        children: [
          Row(
            mainAxisAlignment: MainAxisAlignment.end,
            children: [
              InkWell(
                onTap: () {
                  Get.toNamed('/SingleChat',
                      parameters: {'doctorId': doctor.id.toString()});
                },
                child: Container(
                  padding: EdgeInsets.all(2.0.wp),
                  decoration: BoxDecoration(
                    color: HexColor.fromHex(blue).withOpacity(0.27),
                    border: Border.all(
                      color: HexColor.fromHex(blue),
                      width: 2,
                    ),
                    borderRadius: BorderRadius.circular(6),
                  ),
                  child: SvgPicture.asset(
                    'assets/images/Icon-chat.svg',
                    semanticsLabel: 'chat Icon',
                    width: 3.8.wp,
                    height: 3.8.hp,
                    color: HexColor.fromHex(blue),
                  ),
                ),
              ),
            ],
          ),
          ClipRRect(
            borderRadius: BorderRadius.circular(600.0),
            child: Image.asset(
              "assets/images/user-assets.png",
              fit: BoxFit.fill,
              width: 30.0.wp,
              height: 30.0.wp,
            ),
          ),
          SizedBox(
            height: 2.5.hp,
          ),
          Text(
            "Dr.${doctor.name}",
            style: TextStyle(
              fontSize: 15.0.sp,
              color: HexColor.fromHex(darkBlue),
              fontWeight: FontWeight.bold,
            ),
          ),
          SizedBox(
            height: 0.9.hp,
          ),
          Text(
            doctor.email,
            style: TextStyle(
              fontSize: 11.5.sp,
              color: HexColor.fromHex(lightBlue),
              fontWeight: FontWeight.w500,
            ),
          ),
          SizedBox(
            height: 3.5.hp,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              SvgPicture.asset(
                'assets/images/Icon-star-blue.svg',
                semanticsLabel: 'star Icon',
                width: 3.5.wp,
                height: 3.5.hp,
                color: HexColor.fromHex(blue),
              ),
              SizedBox(
                width: 1.0.wp,
              ),
              Text(
                "4.7",
                style: TextStyle(
                  fontSize: 15.5.sp,
                  color: HexColor.fromHex(blue),
                  fontWeight: FontWeight.bold,
                ),
              ),
              SizedBox(
                width: 4.0.wp,
              ),
              Text(
                "(12 reviews)",
                style: TextStyle(
                  fontSize: 9.9.sp,
                  color: HexColor.fromHex(lightBlue),
                  fontWeight: FontWeight.w400,
                ),
              ),
            ],
          ),
          SizedBox(
            height: 4.7.hp,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Expanded(
                flex: 1,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        // SvgPicture.asset(
                        //   'assets/images/Icon-location.svg',
                        //   semanticsLabel: 'location Icon',
                        //   width: 3.2.wp,
                        //   height: 3.2.hp,
                        // ),
                        Icon(
                          Icons.phone_android_outlined,
                          color: HexColor.fromHex(lightBlue),
                          size: 18,
                        ),
                        SizedBox(
                          width: 2.5.wp,
                        ),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              doctor.phone,
                              style: TextStyle(
                                fontSize: 15.5.sp,
                                color: HexColor.fromHex(darkBlue),
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                            SizedBox(
                              height: 0.6.hp,
                            ),
                            Text(
                              "Phone",
                              style: TextStyle(
                                fontSize: 12.0.sp,
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
              ),
              Container(
                height: 10.9.hp,
                width: 2.0,
                color: HexColor.fromHex(grey),
              ),
              Expanded(
                flex: 1,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        SvgPicture.asset(
                          'assets/images/Icon-pin.svg',
                          semanticsLabel: 'pin Icon',
                          width: 3.2.wp,
                          height: 3.2.hp,
                        ),
                        SizedBox(
                          width: 2.5.wp,
                        ),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              "20 Years",
                              style: TextStyle(
                                fontSize: 15.5.sp,
                                color: HexColor.fromHex(darkBlue),
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                            SizedBox(
                              height: 0.6.hp,
                            ),
                            Text(
                              "Experience",
                              style: TextStyle(
                                fontSize: 12.0.sp,
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
              ),
            ],
          ),
        ],
      ),
    );
  }
}
