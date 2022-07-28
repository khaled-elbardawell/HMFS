import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/home/widget/big_card.dart';
import 'package:hmfs/app/modules/home/widget/single_small_card.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex('#F7F9FC'),
      appBar: customAppBar('HMFS', blue, white, Icons.search_outlined, () {}),
      body: Column(
        children: [
          Expanded(
            child: ListView(
              physics: const BouncingScrollPhysics(),
              shrinkWrap: true,
              children: [
                SizedBox(
                  height: 2.0.hp,
                ),
                const SingleSmallCard(
                  iconanme: 'assets/images/Icon-emergency.svg',
                  semanticsLabel: 'Emergency icon',
                  title: 'Emergency',
                  subTitle: 'call Ambulance',
                  color: red,
                ),
                SizedBox(
                  height: 5.0.hp,
                ),
                Padding(
                  padding: EdgeInsets.symmetric(horizontal: 6.5.wp),
                  child: const Text("Recent Reservation"),
                )
              ],
            ),
          ),
        ],
      ),
    );
  }
}
