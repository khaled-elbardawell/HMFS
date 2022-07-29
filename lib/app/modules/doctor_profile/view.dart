import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/doctor_profile/controller.dart';
import 'package:hmfs/app/modules/doctor_profile/widget/profile_card.dart';
import 'package:hmfs/app/modules/doctor_profile/widget/single_small_card.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';

import '../../data/providers/doctor/provider.dart';
import '../../data/services/doctorapi/repository.dart';

class DoctorProfileScreen extends StatelessWidget {
  DoctorProfileScreen({Key? key}) : super(key: key);
  final doctorProfileCtrl = Get.put(DoctorProfileController(
    doctorRepository: DoctorRepository(
      doctorProvider: DoctorProvider(),
    ),
  ));

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: HexColor.fromHex(white),
        appBar: customAppBar(
            "Doctor's Profile", blue, white, Icons.search_outlined, () {}),
        body: Obx(() {
          if (doctorProfileCtrl.requesting.value) {
            return SingleChildScrollView(
              physics: const BouncingScrollPhysics(),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  ProfileCard(doctor: doctorProfileCtrl.doctor),
                  SizedBox(
                    height: 3.0.hp,
                  ),
                  InkWell(
                    onTap: () {},
                    child: const SingleInfoCard(
                      iconName: 'assets/images/Icon-medical-reports.svg',
                      semanticsLabel: 'Medical Reports',
                      title: 'Medical Reports',
                    ),
                  ),
                  SizedBox(
                    height: 2.0.hp,
                  ),
                  // InkWell(
                  //   onTap: () {
                  //     Get.toNamed('/doctorReview');
                  //   },
                  //   child: const SingleInfoCard(
                  //     iconName: 'assets/images/Icon-reviews.svg',
                  //     semanticsLabel: 'reviews Icon',
                  //     title: 'Reviews',
                  //   ),
                  // ),
                  // SizedBox(
                  //   height: 5.0.hp,
                  // ),
                ],
              ),
            );
          } else {
            return Center(
              child: CircularProgressIndicator(
                color: HexColor.fromHex(blue),
              ),
            );
          }
        }));
  }
}
