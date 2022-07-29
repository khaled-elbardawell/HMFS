import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/reservation/controller.dart';
import 'package:hmfs/app/modules/reservation/widget/previousreservations.dart';
import 'package:hmfs/app/modules/reservation/widget/upcomingreservations.dart';

import '../../core/values/colors.dart';

class ReservationScreen extends StatefulWidget {
  const ReservationScreen({Key? key}) : super(key: key);

  @override
  State<ReservationScreen> createState() => _ReservationScreenState();
}

class _ReservationScreenState extends State<ReservationScreen> {
  ReservationController reservationCtrl = Get.find<ReservationController>();

  @override
  void initState() {
    reservationCtrl.requesting.value = false;
    reservationCtrl.getPreviousReservation();
    reservationCtrl.getUpcomingReservation();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 2,
      child: Scaffold(
        backgroundColor: HexColor.fromHex(white),
        appBar: AppBar(
          centerTitle: true,
          backgroundColor: HexColor.fromHex(blue),
          elevation: 0.0,
          title: Text(
            "Reservation",
            style: TextStyle(
              fontSize: 18.0.sp,
              fontWeight: FontWeight.bold,
              color: HexColor.fromHex(white),
            ),
          ),
          actions: [
            IconButton(
              icon: Icon(
                Icons.search_outlined,
                color: HexColor.fromHex(white),
                size: 30.0,
              ),
              onPressed: () {},
            ),
          ],
          bottom: TabBar(
            indicatorColor: HexColor.fromHex(darkBlue),
            indicatorWeight: 3,
            unselectedLabelColor: HexColor.fromHex(grey),
            labelColor: HexColor.fromHex(white),
            tabs: [
              Tab(
                child: Text(
                  "Upcoming",
                  style: TextStyle(
                    fontSize: 16.0.sp,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              Tab(
                child: Text(
                  "Previous",
                  style: TextStyle(
                    fontSize: 16.0.sp,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
            ],
          ),
        ),
        body: TabBarView(
          children: [
            Obx(
              () {
                if (reservationCtrl.requesting.value) {
                  if (reservationCtrl.upcomingReservationData.isEmpty) {
                    return const Center(
                      child: Text(
                        'There is no Reservation',
                        style: TextStyle(fontSize: 18.0),
                      ),
                    );
                  } else {
                    return UserUpcomingReservations(
                      upcomingReservationData:
                          reservationCtrl.upcomingReservationData,
                    );
                  }
                } else {
                  return Center(
                    child: CircularProgressIndicator(
                      color: HexColor.fromHex(blue),
                    ),
                  );
                }
              },
            ),
            Obx(
              () {
                if (reservationCtrl.requesting.value) {
                  if (reservationCtrl.previousReservationData.isEmpty) {
                    return const Center(
                      child: Text(
                        'There is no previous Reservation',
                        style: TextStyle(fontSize: 18.0),
                      ),
                    );
                  } else {
                    return PreviousReservations(
                      previousReservationData:
                          reservationCtrl.previousReservationData,
                    );
                  }
                } else {
                  return Center(
                    child: CircularProgressIndicator(
                      color: HexColor.fromHex(blue),
                    ),
                  );
                }
              },
            ),
          ],
        ),
      ),
    );
  }
}
