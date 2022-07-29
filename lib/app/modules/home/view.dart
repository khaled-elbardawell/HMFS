import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/home/controller.dart';
import 'package:hmfs/app/modules/home/widget/single_small_card.dart';
import 'package:hmfs/app/modules/reservation/widget/upcomingreservations.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';

class HomeScreen extends GetView<HomeController> {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    controller.requesting.value = false;
    // controller.getUpcomingReservation();
    controller.getPreviousReservation();
    return Scaffold(
      backgroundColor: HexColor.fromHex('#F7F9FC'),
      appBar: customAppBar('HMFS', blue, white, Icons.search_outlined, () {}),
      body: Obx(
        () {
          if (controller.requesting.value) {
            return Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                SizedBox(
                  height: 2.0.hp,
                ),
                const SingleSmallCard(
                  iconName: 'assets/images/Icon-emergency.svg',
                  semanticsLabel: 'Emergency icon',
                  title: 'Emergency',
                  subTitle: 'call Ambulance',
                  color: red,
                ),
                SizedBox(
                  height: 3.0.hp,
                ),
                Padding(
                  padding: EdgeInsets.symmetric(horizontal: 6.5.wp),
                  child: Text(
                    "Recent Reservation",
                    style: TextStyle(
                        color: Colors.black,
                        fontSize: 15.0.sp,
                        fontWeight: FontWeight.bold),
                  ),
                ),
                Expanded(
                  child: controller.upcomingReservationData.isEmpty
                      ? const Center(
                          child: Text(
                            'There is no Upcoming Reservation',
                            style: TextStyle(fontSize: 18.0),
                          ),
                        )
                      : UserUpcomingReservations(
                          upcomingReservationData:
                              controller.upcomingReservationData,
                        ),
                ),
              ],
            );
          } else {
            return const Center(
              child: CircularProgressIndicator(),
            );
          }
        },
      ),
    );
  }
}
