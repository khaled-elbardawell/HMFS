import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/doctor_review/controller.dart';
import 'package:hmfs/app/modules/doctor_review/widget/single_review_item.dart';

class DoctorReviewScreen extends StatelessWidget {
  DoctorReviewScreen({Key? key}) : super(key: key);
  final reviewCtrl = Get.put(DoctorReviewController());

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: AppBar(
        backgroundColor: HexColor.fromHex(blue),
        centerTitle: true,
        title: Text(
          "Review Details",
          style: TextStyle(
            fontSize: 18.0.sp,
            fontWeight: FontWeight.bold,
            color: HexColor.fromHex(white),
          ),
        ),
      ),
      body: Padding(
        padding: EdgeInsets.symmetric(horizontal: 6.5.wp, vertical: 7.5.wp),
        child: Column(
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                ClipRRect(
                  borderRadius: BorderRadius.circular(600.0),
                  child: Image.asset(
                    "assets/images/doctor-avatar.jpg",
                    fit: BoxFit.fill,
                    width: 18.0.wp,
                    height: 18.0.wp,
                  ),
                ),
                SizedBox(
                  width: 5.0.wp,
                ),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Text(
                      "Sakane Miiko",
                      style: TextStyle(
                        fontSize: 13.5.sp,
                        color: HexColor.fromHex(darkBlue),
                        fontWeight: FontWeight.w500,
                      ),
                    ),
                    SizedBox(
                      height: 0.5.hp,
                    ),
                    Text(
                      "1 day ago",
                      style: TextStyle(
                        fontSize: 9.5.sp,
                        color: HexColor.fromHex(lightBlue),
                        fontWeight: FontWeight.w500,
                      ),
                    ),
                  ],
                ),
              ],
            ),
            SizedBox(
              height: 2.66.hp,
            ),
            Divider(
              endIndent: 2,
              indent: 2,
              thickness: 2,
              color: HexColor.fromHex(grey),
            ),
            SizedBox(
              height: 2.0.hp,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                Obx(() => Text(
                      '${reviewCtrl.totalRate.value}',
                      style: TextStyle(
                        color: HexColor.fromHex(blue),
                        fontWeight: FontWeight.w900,
                        fontSize: 16.5.sp,
                      ),
                    )),
                SizedBox(
                  width: 3.6.wp,
                ),
                Obx(() => RatingBarIndicator(
                      rating: reviewCtrl.totalRate.value,
                      itemBuilder: (context, index) => SvgPicture.asset(
                        'assets/images/Icon-star-review.svg',
                        semanticsLabel: 'Star Icon',
                        color: HexColor.fromHex(blue),
                        width: 4.0.wp,
                        height: 4.0.hp,
                      ),
                      itemCount: 5,
                      itemSize: 9.0.wp,
                      direction: Axis.horizontal,
                    )),
              ],
            ),
            SizedBox(
              height: 4.0.hp,
            ),
            Obx(() => SingleReviewItem(
                  iconName: 'assets/images/Icon-clock.svg',
                  semanticsLabel: 'heart Icon',
                  title: 'Wait Time',
                  rate: reviewCtrl.waitTimeRate.value,
                  changeRate: reviewCtrl.changeWaitTimeRate,
                )),
            Obx(() => SingleReviewItem(
                  iconName: 'assets/images/Icon-heart.svg',
                  semanticsLabel: 'heart Icon',
                  title: 'Bedside Manner',
                  rate: reviewCtrl.bedsideRate.value,
                  changeRate: reviewCtrl.changeBedsideRate,
                )),
            Obx(() => SingleReviewItem(
                  iconName: 'assets/images/Icon-consulting.svg',
                  semanticsLabel: 'Consulting Icon',
                  title: 'Consulting',
                  rate: reviewCtrl.consultingeRate.value,
                  changeRate: reviewCtrl.changeConsultingeRate,
                )),
          ],
        ),
      ),
    );
  }
}
