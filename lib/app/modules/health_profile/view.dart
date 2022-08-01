import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/data/providers/chat/provider.dart';
import 'package:hmfs/app/data/services/chat_services/repository.dart';
import 'package:hmfs/app/data/services/healthprofile/repository.dart';
import 'package:hmfs/app/modules/health_profile/controller.dart';
import 'package:hmfs/app/modules/health_profile/widget/single_card_health_profile.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';

import '../../core/values/colors.dart';
import '../../data/providers/healthprofile/provider.dart';

// ignore: must_be_immutable
class HealthProfileScreen extends StatelessWidget {
  HealthProfileScreen({Key? key}) : super(key: key);
  HealthProfileController healthProfileCtrl = Get.put(
    HealthProfileController(
      healthProfileRepository: HealthProfileRepository(
        healthProfileProvider: HealthProfileProvider(),
      ),
      chatRepository: ChatRepository(
        chatProvider: ChatProvider(),
      ),
    ),
  );

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: customAppBar(
          "Health Profile", blue, white, Icons.search_rounded, () {}),
      body: Obx(() {
        if (healthProfileCtrl.requesting.value) {
          return Padding(
            padding: EdgeInsets.symmetric(horizontal: 6.5.wp, vertical: 1.0.hp),
            child: ListView.builder(
              physics: const BouncingScrollPhysics(),
              itemCount: healthProfileCtrl.healthProfiles.length,
              itemBuilder: (context, index) {
                return SingleCardHealthProfile(
                  healthProfileCtrl: healthProfileCtrl,
                  healthProfiles: healthProfileCtrl.healthProfiles[index],
                );
              },
            ),
          );
        } else {
          return Center(
            child: CircularProgressIndicator(
              color: HexColor.fromHex(blue),
            ),
          );
        }
      }),
    );
  }
}
