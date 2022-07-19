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
                  height: 2.0.hp,
                ),
                const SingleSmallCard(
                  iconanme: 'assets/images/Icon-last-status.svg',
                  semanticsLabel: 'Specialities icon',
                  title: 'Specialities',
                  subTitle: 'Last Status',
                  color: blue,
                ),
                SizedBox(
                  height: 2.0.hp,
                ),
                SizedBox(
                  height: 30.0.hp,
                  child: ListView(
                    physics: const BouncingScrollPhysics(),
                    shrinkWrap: false,
                    scrollDirection: Axis.horizontal,
                    children: [
                      Padding(
                        padding: EdgeInsets.only(
                          left: 6.5.wp,
                          right: 4.0.wp,
                        ),
                        child: const BigCard(
                          iconanme: 'assets/images/Icon-heart-rate.svg',
                          semanticsLabel: 'Heart Rate icon',
                          title: 'Heart Beats',
                          subTitle: 'Heart Rate',
                          color: red,
                        ),
                      ),
                      const SizedBox(
                        width: 0,
                      ),
                      Padding(
                        padding: EdgeInsets.only(
                          left: 4.0.wp,
                          right: 6.5.wp,
                        ),
                        child: const BigCard(
                          iconanme: 'assets/images/Icon-blood-pressure.svg',
                          semanticsLabel: 'Blood Pressure icon',
                          title: 'Blood Pressure',
                          subTitle: 'Blood Pressure Rate',
                          color: blue,
                        ),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
