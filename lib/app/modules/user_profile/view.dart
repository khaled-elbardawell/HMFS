import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/user_profile/controller.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';
import 'package:hmfs/app/widgets/user_data_card.dart';

import '../../core/values/colors.dart';

class UserProfileScreen extends GetView<UserProfileController> {
  const UserProfileScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: customAppBar("Profile", blue, white, Icons.logout_outlined,
          () => controller.logout()),
      body: Obx(() {
        if (controller.requesting.value) {
          return Column(
            children: [
              Container(
                padding: EdgeInsets.only(bottom: 5.0.wp, top: 5.0.wp),
                decoration: BoxDecoration(
                  color: HexColor.fromHex(blue),
                ),
                child: Column(
                  children: [
                    Padding(
                      padding: EdgeInsets.symmetric(horizontal: 6.5.wp),
                      child: UserDataCard(
                        imageName: "assets/images/doctor-avatar.jpg",
                        imageSize: 20.0,
                        isOnline: false,
                        title: controller.userProfile.data.name,
                        titleColor: white,
                        titleSize: 13.0,
                        subTitle: controller.userProfile.data.email,
                        subTitleSize: 10.5,
                        subTitleColor: white,
                      ),
                    ),
                    SizedBox(
                      height: 2.0.hp,
                    ),
                    Divider(
                      color: HexColor.fromHex(white),
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
                        color: HexColor.fromHex(white),
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
                              color: HexColor.fromHex(blue).withOpacity(0.15),
                              border: Border.all(
                                color: HexColor.fromHex(blue),
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
                                        color: HexColor.fromHex(blue),
                                        fontSize: 16.0.sp,
                                        fontWeight: FontWeight.w700,
                                      ),
                                    ),
                                    SizedBox(
                                      height: 0.7.hp,
                                    ),
                                    Text(
                                      controller.userProfile.data.id.toString(),
                                      style: TextStyle(
                                        color: HexColor.fromHex(blue),
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
                          Padding(
                            padding: EdgeInsets.symmetric(vertical: 2.5.wp),
                            child: ListTile(
                              onTap: () {
                                Get.offNamed('/editAccount');
                              },
                              contentPadding: const EdgeInsets.all(0.0),
                              title: Text(
                                'Edit Profile',
                                style: TextStyle(
                                  fontSize: 13.0.sp,
                                  fontWeight: FontWeight.w600,
                                  color: HexColor.fromHex(darkBlue),
                                ),
                              ),
                              leading: Container(
                                padding: EdgeInsets.all(2.0.wp),
                                decoration: BoxDecoration(
                                  color:
                                      HexColor.fromHex(blue).withOpacity(0.15),
                                  borderRadius: BorderRadius.circular(5.0),
                                ),
                                child: SvgPicture.asset(
                                  'assets/images/Icon-setting.svg',
                                  semanticsLabel: 'Icon setting',
                                  color: HexColor.fromHex(blue),
                                  width: 4.5.wp,
                                  height: 4.5.hp,
                                ),
                              ),
                              trailing: Icon(
                                Icons.arrow_forward_ios_rounded,
                                color: HexColor.fromHex(lightBlue),
                                size: 5.0.wp,
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ),
              ),
            ],
          );
        } else {
          return const Center(
            child: CircularProgressIndicator(),
          );
        }
      }),
    );
  }
}
