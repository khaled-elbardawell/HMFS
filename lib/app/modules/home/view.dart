import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/home/widget/big_card.dart';
import 'package:hmfs/app/modules/home/widget/single_small_card.dart';
import 'package:hmfs/app/widgets/custom_appbar.dart';
// import 'package:hmfs/app/widgets/appbar.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        const CustomAppBar(
          appBarColor: '#6574CF',
          title: "HMFS",
          titleColor: "#ffffff",
          bottomPadding: 5.0,
          titleSize: 26.0,
        ),
        Form(
          child: Container(
            decoration: BoxDecoration(
              color: HexColor.fromHex('#6574CF'),
            ),
            child: Padding(
              padding: EdgeInsets.fromLTRB(6.0.wp, 0.0.wp, 6.0.wp, 6.0.wp),
              child: Container(
                padding: EdgeInsets.all(1.0.wp),
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(5.0),
                  color: Colors.white.withOpacity(0.25),
                ),
                child: TextFormField(
                  // controller: ,
                  textAlignVertical: TextAlignVertical.center,
                  style: TextStyle(
                    color: Colors.white,
                    fontSize: 14.0.sp,
                  ),
                  cursorColor: Colors.white,
                  decoration: InputDecoration(
                    hintText: ' Search Doctors, Clinics ...',
                    hintStyle: const TextStyle(
                      color: Colors.white,
                    ),
                    border: InputBorder.none,
                    suffixIcon: IconButton(
                      icon: const Icon(
                        Icons.search_outlined,
                      ),
                      color: Colors.white,
                      iconSize: 24.0.sp,
                      onPressed: () {},
                    ),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'please add data';
                    }
                    return null;
                  },
                ),
              ),
            ),
          ),
        ),
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
                color: '#FF4E32',
              ),
              SizedBox(
                height: 2.0.hp,
              ),
              const SingleSmallCard(
                iconanme: 'assets/images/Icon-last-status.svg',
                semanticsLabel: 'Specialities icon',
                title: 'Specialities',
                subTitle: 'Last Status',
                color: '#6574CF',
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
                        color: '#FF4E32',
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
                        color: '#6574CF',
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
        ),
      ],
    );
  }
}
