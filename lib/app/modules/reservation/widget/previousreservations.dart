import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/reservation/widget/single_card_reservation.dart';

import '../../../data/models/reservation.dart';

class PreviousReservations extends StatelessWidget {
  final List<Reservation> previousReservationData;
  const PreviousReservations({Key? key, required this.previousReservationData})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Expanded(
          child: Padding(
            padding: EdgeInsets.symmetric(vertical: 3.5.wp, horizontal: 6.5.wp),
            child: ListView.builder(
              itemCount: previousReservationData.length,
              physics: const BouncingScrollPhysics(),
              itemBuilder: (context, index) {
                return SingleCardReservation(
                  reservation: previousReservationData[index],
                );
              },
            ),
          ),
        )
      ],
    );
  }
}
