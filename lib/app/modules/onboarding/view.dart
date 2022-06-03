import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/onboarding/controller.dart';
import 'package:hmfs/app/modules/onboarding/widget/singleonboarding.dart';

class OnboardingScreen extends StatelessWidget {
  final onboardingCrtl = Get.put(OnboardingController());
  OnboardingScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        backgroundColor: Colors.white,
        elevation: 0,
      ),
      body: Padding(
        padding: EdgeInsets.symmetric(horizontal: 6.0.wp),
        child: Column(
          children: [
            Expanded(
              child: PageView.builder(
                physics: const BouncingScrollPhysics(),
                controller: onboardingCrtl.pageController,
                onPageChanged: onboardingCrtl.selectedPageIndex,
                itemCount: onboardingCrtl.onboardingPages.length,
                itemBuilder: (context, index) {
                  return Column(
                    children: [
                      SingleOnboarding(
                        title: onboardingCrtl.onboardingPages[index].title,
                        subTitle:
                            onboardingCrtl.onboardingPages[index].subTitle,
                        image: onboardingCrtl.onboardingPages[index].image,
                        paragrah:
                            onboardingCrtl.onboardingPages[index].paragrah,
                      ),
                    ],
                  );
                },
              ),
            ),
            SizedBox(
              height: 2.5.hp,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                Row(
                  children: List.generate(
                      onboardingCrtl.onboardingPages.length,
                      (index) => Obx(
                            () {
                              return Container(
                                margin: const EdgeInsets.all(3.0),
                                width: onboardingCrtl.selectedPageIndex.value ==
                                        index
                                    ? 20.5
                                    : 8.5,
                                height: 8.5,
                                decoration: BoxDecoration(
                                  color:
                                      onboardingCrtl.selectedPageIndex.value ==
                                              index
                                          ? HexColor.fromHex('#6574CF')
                                          : HexColor.fromHex('#C5CEE0'),
                                  borderRadius: BorderRadius.circular(50),
                                ),
                              );
                            },
                          )),
                ),
                ElevatedButton(
                  style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(
                      HexColor.fromHex('#6574CF'),
                    ),
                    padding: MaterialStateProperty.all(
                      EdgeInsets.symmetric(
                        vertical: 3.0.wp,
                        horizontal: 4.0.wp,
                      ),
                    ),
                  ),
                  onPressed: () {
                    onboardingCrtl.forwardAction();
                  },
                  child: Row(
                    children: [
                      Text(
                        'Next',
                        style: TextStyle(
                          color: Colors.white,
                          fontSize: 11.5.sp,
                        ),
                      ),
                      SizedBox(
                        width: 2.0.wp,
                      ),
                      const Icon(
                        Icons.arrow_circle_right_outlined,
                      ),
                    ],
                  ),
                ),
              ],
            ),
            SizedBox(
              height: 2.0.hp,
            ),
          ],
        ),
      ),
    );
  }
}
