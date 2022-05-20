import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/user_profile/widget/single_list_card.dart';
import 'package:hmfs/app/widgets/custom_appbar.dart';
import 'package:hmfs/app/widgets/user_data_card.dart';

class UserProfileScreen extends StatelessWidget {
  const UserProfileScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        const CustomAppBar(
          appBarColor: "#6574CF",
          title: "Profile",
          titleColor: "#FFFFFF",
          iconName1: "assets/images/Icon-alert.svg",
          iconSemantics1: 'Icon alert',
          colorIcon1: '#ffffff',
          iconName2: "assets/images/Icon-setting.svg",
          iconSemantics2: 'Icon-setting.svg',
          colorIcon2: '#ffffff',
          iconSize: 4.0,
          bottomPadding: 9.0,
        ),
        Container(
          padding: EdgeInsets.only(bottom: 5.0.wp),
          decoration: BoxDecoration(
            color: HexColor.fromHex("#6574CF"),
          ),
          child: Column(
            children: [
              Padding(
                padding: EdgeInsets.symmetric(horizontal: 6.5.wp),
                child: const UserDataCard(
                  imageName: "assets/images/doctor-avatar.jpg",
                  imageSize: 20.0,
                  isOnline: false,
                  title: "Deveeprasad Acharya",
                  titleColor: '#FBFBFB',
                  titleSize: 13.0,
                  subTitle: "20 yrs old",
                  subTitleSize: 10.5,
                  subTitleColor: '#DEDFE1',
                ),
              ),
              SizedBox(
                height: 2.0.hp,
              ),
              Divider(
                color: HexColor.fromHex('#EDF1F7'),
                indent: 6.5.wp,
                endIndent: 6.5.wp,
                thickness: 1,
              ),
            ],
          ),
        ),
        Expanded(
          child: SingleChildScrollView(
            physics: const BouncingScrollPhysics(),
            child: Padding(
              padding: EdgeInsets.all(6.5.wp),
              child: Container(
                padding: EdgeInsets.only(
                  top: 3.5.wp,
                  right: 3.5.wp,
                  left: 3.5.wp,
                  bottom: 0.0.wp,
                ),
                decoration: BoxDecoration(
                  color: HexColor.fromHex('#ffffff'),
                  borderRadius: BorderRadius.circular(3.0),
                  boxShadow: const [
                    BoxShadow(
                      blurRadius: 0.09,
                      color: Colors.grey,
                    ),
                  ],
                ),
                child: Column(
                  children: [
                    Container(
                      padding: EdgeInsets.all(3.2.wp),
                      decoration: BoxDecoration(
                        color: HexColor.fromHex('#6574CF').withOpacity(0.15),
                        border: Border.all(
                          color: HexColor.fromHex('#6574CF'),
                        ),
                        borderRadius: BorderRadius.circular(5.0),
                      ),
                      child: Row(
                        children: [
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'Your Code:',
                                style: TextStyle(
                                  color: HexColor.fromHex('#6574CF'),
                                  fontSize: 16.0.sp,
                                  fontWeight: FontWeight.w700,
                                ),
                              ),
                              SizedBox(
                                height: 0.7.hp,
                              ),
                              Text(
                                'Fgos5dl45',
                                style: TextStyle(
                                  color: HexColor.fromHex('#6574CF'),
                                  fontSize: 12.5.sp,
                                  fontWeight: FontWeight.w500,
                                ),
                              ),
                            ],
                          ),
                          const Spacer(),
                          SvgPicture.asset(
                            'assets/images/Icon-user-code.svg',
                            semanticsLabel: 'user code',
                            width: 7.0.wp,
                            height: 7.0.hp,
                          ),
                        ],
                      ),
                    ),
                    SizedBox(
                      height: 3.0.hp,
                    ),
                    const SingleListCard(
                      iconName: 'assets/images/Icon-calendar.svg',
                      iconSemanticsLabel: 'Icon Calendar',
                      title: 'Reservation',
                      titleColor: '#222B45',
                      titleSize: 13.0,
                    ),
                    const SingleListCard(
                      iconName: 'assets/images/Icon-doctors-active.svg',
                      iconSemanticsLabel: 'Icon Doctors',
                      title: 'My Doctors',
                      titleColor: '#222B45',
                      titleSize: 13.0,
                    ),
                    const SingleListCard(
                      iconName: 'assets/images/Icon-setting.svg',
                      iconSemanticsLabel: 'Icon Setting',
                      title: 'Edit Account',
                      titleColor: '#222B45',
                      titleSize: 13.0,
                    ),
                    const SingleListCard(
                      iconName: 'assets/images/Icon-logout.svg',
                      iconSemanticsLabel: 'Icon logout',
                      title: 'Logout',
                      titleColor: '#222B45',
                      titleSize: 13.0,
                    ),
                  ],
                ),
              ),
            ),
          ),
        ),
      ],
    );
  }
}
