import 'dart:io';
import 'dart:ui';

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/health_profile/controller.dart';
import 'package:hmfs/app/modules/health_profile/widget/single_doctor_card.dart';

import '../../../core/values/colors.dart';

class SingleHealthProfile extends StatelessWidget {
  SingleHealthProfile({Key? key}) : super(key: key);
  HealthProfileController healthProfileCtrl =
      Get.find<HealthProfileController>();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: AppBar(
        backgroundColor: HexColor.fromHex(white),
        iconTheme: IconThemeData(color: HexColor.fromHex('#000000')),
      ),
      body: SingleChildScrollView(
        physics: const BouncingScrollPhysics(),
        child: Padding(
          padding: EdgeInsets.symmetric(vertical: 3.5.wp, horizontal: 6.5.wp),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              SingleDoctorCard(
                doctor: healthProfileCtrl.healthProfile.doctor,
              ),
              Padding(
                padding:
                    EdgeInsets.symmetric(vertical: 2.0.wp, horizontal: 0.5.wp),
                child: Container(
                  width: double.infinity,
                  padding: EdgeInsets.symmetric(
                    vertical: 4.0.wp,
                    horizontal: 4.5.wp,
                  ),
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(5.0),
                    boxShadow: [
                      BoxShadow(color: Colors.grey[300]!, blurRadius: 1)
                    ],
                  ),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      SizedBox(
                        width: double.infinity,
                        child: Text(
                          'Health Report',
                          textAlign: TextAlign.center,
                          style: TextStyle(
                            fontSize: 20.0,
                            color: HexColor.fromHex(darkBlue),
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                      ),
                      SizedBox(
                        height: 2.5.hp,
                      ),
                      RichText(
                        text: TextSpan(
                          children: [
                            TextSpan(
                              text: 'Title :',
                              style: TextStyle(
                                fontSize: 14.0.sp,
                                color: HexColor.fromHex(darkBlue),
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                            TextSpan(
                              text: ' ${healthProfileCtrl.healthProfile.title}',
                              style: TextStyle(
                                fontSize: 14.0.sp,
                                color: HexColor.fromHex(lightBlue),
                                fontWeight: FontWeight.w400,
                              ),
                            ),
                          ],
                        ),
                      ),
                      SizedBox(
                        height: 2.5.hp,
                      ),
                      Text(
                        'Description :',
                        textAlign: TextAlign.center,
                        style: TextStyle(
                          fontSize: 14.0.sp,
                          color: HexColor.fromHex(darkBlue),
                          fontWeight: FontWeight.w500,
                        ),
                      ),
                      SizedBox(
                        height: 1.0.hp,
                      ),
                      Text(
                        healthProfileCtrl.healthProfile.description,
                        textAlign: TextAlign.center,
                        style: TextStyle(
                          fontSize: 14.0.sp,
                          color: HexColor.fromHex(lightBlue),
                          fontWeight: FontWeight.w400,
                        ),
                      ),
                      SizedBox(
                        height: 2.5.hp,
                      ),
                      Text(
                        'Recommendations :',
                        textAlign: TextAlign.center,
                        style: TextStyle(
                          fontSize: 14.0.sp,
                          color: HexColor.fromHex(darkBlue),
                          fontWeight: FontWeight.w500,
                        ),
                      ),
                      SizedBox(
                        height: 1.0.hp,
                      ),
                      Text(
                        healthProfileCtrl.healthProfile.recommendations,
                        textAlign: TextAlign.center,
                        style: TextStyle(
                          fontSize: 14.0.sp,
                          color: HexColor.fromHex(lightBlue),
                          fontWeight: FontWeight.w400,
                        ),
                      ),
                      SizedBox(
                        height: 2.5.hp,
                      ),
                      RichText(
                        text: TextSpan(
                          children: [
                            TextSpan(
                              text: 'requests :',
                              style: TextStyle(
                                fontSize: 14.0.sp,
                                color: HexColor.fromHex(darkBlue),
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                            TextSpan(
                              text:
                                  ' ${healthProfileCtrl.healthProfile.requests}',
                              style: TextStyle(
                                fontSize: 14.0.sp,
                                color: HexColor.fromHex(lightBlue),
                                fontWeight: FontWeight.w400,
                              ),
                            ),
                          ],
                        ),
                      ),
                      SizedBox(
                        height: 2.5.hp,
                      ),
                    ],
                  ),
                ),
              ),
              Padding(
                padding:
                    EdgeInsets.symmetric(vertical: 2.0.wp, horizontal: 0.5.wp),
                child: Container(
                  width: double.infinity,
                  padding: EdgeInsets.symmetric(
                    vertical: 4.0.wp,
                    horizontal: 4.5.wp,
                  ),
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(5.0),
                    boxShadow: [
                      BoxShadow(color: Colors.grey[300]!, blurRadius: 1)
                    ],
                  ),
                  child: Expanded(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.start,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        SizedBox(
                          width: double.infinity,
                          child: Text(
                            'Files',
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              fontSize: 20.0,
                              color: HexColor.fromHex(darkBlue),
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                        ),
                        SizedBox(
                          height: 2.5.hp,
                        ),
                        ListView.builder(
                          shrinkWrap: true,
                          primary: false,
                          itemCount:
                              healthProfileCtrl.healthProfile.uploads.length,
                          itemBuilder: (context, index) {
                            var completePath = healthProfileCtrl
                                .healthProfile.uploads[index].file;
                            var fileName = (completePath.split('.').last);

                            return TextButton.icon(
                              style: const ButtonStyle(
                                alignment: Alignment.centerLeft,
                              ),
                              onPressed: () {},
                              icon: Icon(
                                Icons.file_download_outlined,
                                color: HexColor.fromHex(lightBlue),
                              ),
                              label: Text(
                                "report${index + 1}.$fileName",
                                style: TextStyle(
                                  fontSize: 12.0.sp,
                                  color: HexColor.fromHex(lightBlue),
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                            );
                          },
                        ),
                      ],
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
