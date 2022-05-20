import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/doctor_profile/controller.dart';
import 'package:hmfs/app/modules/doctor_profile/widget/profile_card.dart';
import 'package:hmfs/app/modules/doctor_profile/widget/single_small_card.dart';

class DoctorProfileScreen extends StatelessWidget {
  DoctorProfileScreen({Key? key}) : super(key: key);
  final doctorsCtrl = Get.put(DoctorProfileController());

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex('#F7F9FC'),
      appBar: AppBar(
        title: const Text(
          "Doctor's Profile",
        ),
        actions: [
          IconButton(
            splashRadius: 5.8.wp,
            onPressed: () {},
            icon: SvgPicture.asset(
              'assets/images/Icon-location.svg',
              semanticsLabel: 'Location Icon',
              width: 3.8.wp,
              height: 3.8.hp,
              color: Colors.white,
            ),
          ),
        ],
      ),
      body: SingleChildScrollView(
        physics: const BouncingScrollPhysics(),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            const ProfileCard(),
            SizedBox(
              height: 3.0.hp,
            ),
            InkWell(
              onTap: () {},
              child: const SingleInfoCard(
                iconanme: 'assets/images/Icon-medical-reports.svg',
                semanticsLabel: 'Medical Reports',
                title: 'Medical Reports',
              ),
            ),
            SizedBox(
              height: 2.0.hp,
            ),
            InkWell(
              onTap: () {
                Get.toNamed('/doctorReview');
              },
              child: const SingleInfoCard(
                iconanme: 'assets/images/Icon-reviews.svg',
                semanticsLabel: 'reviews Icon',
                title: 'Reviews',
              ),
            ),
            SizedBox(
              height: 5.0.hp,
            ),
          ],
        ),
      ),
    );
  }
}
