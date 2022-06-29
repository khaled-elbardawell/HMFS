import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/doctor_review/controller.dart';

// ignore: must_be_immutable
class SingleReviewItem extends StatelessWidget {
  var reviewCtrl = Get.put(DoctorReviewController());
  final String iconName;
  final String semanticsLabel;
  final String title;
  double rate;
  Function changeRate;

  SingleReviewItem({
    Key? key,
    required this.iconName,
    required this.semanticsLabel,
    required this.title,
    this.rate = 0.0,
    required this.changeRate,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.symmetric(vertical: 2.9.wp),
      child: Column(
        children: [
          Row(
            children: [
              Row(
                children: [
                  SvgPicture.asset(
                    iconName,
                    semanticsLabel: semanticsLabel,
                    color: HexColor.fromHex('#8F9BB3'),
                    width: 3.5.wp,
                    height: 3.5.hp,
                  ),
                  SizedBox(
                    width: 4.0.wp,
                  ),
                  Text(
                    title,
                    style: TextStyle(
                      color: HexColor.fromHex('#8F9BB3'),
                      fontSize: 10.0.sp,
                    ),
                  )
                ],
              ),
              const Spacer(),
              Row(
                children: [
                  Text(
                    '$rate',
                    style: TextStyle(
                      color: HexColor.fromHex('#707FD5'),
                      fontWeight: FontWeight.w900,
                      fontSize: 13.0.sp,
                    ),
                  ),
                  SizedBox(
                    width: 3.6.wp,
                  ),
                  RatingBar.builder(
                    onRatingUpdate: (rate) {
                      changeRate(rate);
                    },
                    itemBuilder: (context, index) => SvgPicture.asset(
                      'assets/images/Icon-star-review.svg',
                      semanticsLabel: 'Star Icon',
                      color: HexColor.fromHex('#707FD5'),
                      width: 4.0.wp,
                      height: 4.0.hp,
                    ),
                    itemCount: 5,
                    itemSize: 6.0.wp,
                    direction: Axis.horizontal,
                    allowHalfRating: true,
                    initialRating: 1,
                    minRating: 1,
                  ),
                ],
              ),
            ],
          ),
          SizedBox(
            height: 1.0.hp,
          ),
          Divider(
            endIndent: 2,
            indent: 2,
            thickness: 2,
            color: HexColor.fromHex('#EDF1F7'),
          ),
        ],
      ),
    );
  }
}
