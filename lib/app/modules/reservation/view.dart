import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/reservation/widget/single_card_reservation.dart';

import '../../core/values/colors.dart';
import '../../widgets/custom_new_appbar.dart';

class ReservationScreen extends StatelessWidget {
  const ReservationScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: customAppBar(
          "Reservation", blue, white, Icons.search_outlined, () {}),
      body: Column(
        children: [
          Expanded(
            child: Padding(
              padding:
                  EdgeInsets.symmetric(vertical: 3.5.wp, horizontal: 6.5.wp),
              child: ListView.builder(
                itemCount: 20,
                physics: const BouncingScrollPhysics(),
                itemBuilder: (context, index) {
                  return const SingleCardReservation();
                },
              ),
            ),
          )
        ],
      ),
    );
  }
}
