import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/reservation/widget/single_card_reservation.dart';
import 'package:hmfs/app/widgets/custom_appbar.dart';

class ReservationScreen extends StatelessWidget {
  const ReservationScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        const CustomAppBar(
          appBarColor: '#FFFFFF',
          title: "Reservation",
          titleColor: '#222B45',
          iconName1: 'assets/images/Icon-alert.svg',
          iconSemantics1: 'alert Icon',
          iconSize: 4.5,
        ),
        Expanded(
          child: Padding(
            padding: EdgeInsets.symmetric(vertical: 3.5.wp, horizontal: 6.5.wp),
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
    );
  }
}
