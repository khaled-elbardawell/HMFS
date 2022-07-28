import 'dart:io';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/data/providers/userprofile/provider.dart';
import 'package:hmfs/app/data/services/userprofile/repository.dart';
import 'package:hmfs/app/modules/user_profile/controller.dart';
import 'package:hmfs/app/modules/user_profile/widget/edit_text_field.dart';
import 'package:hmfs/app/widgets/custom_log_bottom.dart';

import '../../../core/utils/key.dart';
import '../../../core/values/colors.dart';

class EditProfile extends StatelessWidget {
  final userProfileCtrl = Get.find<UserProfileController>();
  EditProfile({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: AppBar(
        centerTitle: true,
        backgroundColor: HexColor.fromHex(blue),
        elevation: 0.0,
        title: Text(
          "Edit Profile",
          style: TextStyle(
            fontSize: 18.0.sp,
            fontWeight: FontWeight.bold,
            color: HexColor.fromHex(white),
          ),
        ),
      ),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: SingleChildScrollView(
          child: Padding(
            padding: EdgeInsets.all(6.0.wp),
            child: Form(
              key: userProfileCtrl.editFormKey,
              child: Column(
                children: [
                  Obx(
                    () {
                      if (userProfileCtrl.imageName.value != '') {
                        print('rrrr : ${userProfileCtrl.typeImage.value}');
                        print(
                            'imageName rrrr : ${userProfileCtrl.imageName.value}');

                        return ClipRRect(
                          borderRadius: BorderRadius.circular(600.0),
                          child: userProfileCtrl.typeImage.value == 'network'
                              ? Image.network(
                                  '$baseUrl/upload/images/full/${userProfileCtrl.imageName.value}',
                                  fit: BoxFit.fill,
                                  width: 20.0.wp,
                                  height: 20.0.wp,
                                )
                              : Image.file(
                                  File(userProfileCtrl.imageName.value),
                                  fit: BoxFit.fill,
                                  width: 20.0.wp,
                                  height: 20.0.wp,
                                ),
                        );
                      } else {
                        return ClipRRect(
                          borderRadius: BorderRadius.circular(600.0),
                          child: Image.asset(
                            "assets/images/user-assets.png",
                            fit: BoxFit.fill,
                            width: 20.0.wp,
                            height: 20.0.wp,
                          ),
                        );
                      }
                    },
                  ),
                  const SizedBox(
                    height: 15.0,
                  ),
                  TextButton.icon(
                    style: ButtonStyle(
                      backgroundColor:
                          MaterialStateProperty.resolveWith((states) {
                        return HexColor.fromHex(blue);
                      }),
                    ),
                    onPressed: () {
                      userProfileCtrl.pickImage();
                    },
                    icon: Icon(
                      Icons.image,
                      color: HexColor.fromHex(white),
                    ),
                    label: Text(
                      'Add profile picture',
                      style: TextStyle(
                        color: HexColor.fromHex(white),
                      ),
                    ),
                  ),
                  const SizedBox(
                    height: 20.0,
                  ),
                  EditTextField(
                    controller: userProfileCtrl.nameController,
                    textInputType: TextInputType.text,
                    hintText: "Name",
                    title: "Name",
                    marginBottom: 2.0.hp,
                    obscureText: false,
                    errorMessage: 'name number is required',
                    initialValue: userProfileCtrl.nameController.text,
                  ),
                  EditTextField(
                    controller: userProfileCtrl.phoneController,
                    textInputType: TextInputType.phone,
                    hintText: "phone number",
                    title: "phone",
                    marginBottom: 2.0.hp,
                    obscureText: false,
                    errorMessage: 'phone number is required',
                    initialValue: userProfileCtrl.phoneController.text,
                  ),
                  EditTextField(
                    controller: userProfileCtrl.bioController,
                    textInputType: TextInputType.text,
                    hintText: "bio",
                    title: "bio",
                    marginBottom: 2.0.hp,
                    obscureText: false,
                    errorMessage: 'bio is required',
                    initialValue: userProfileCtrl.nameController.text,
                  ),
                  const SizedBox(
                    height: 30.0,
                  ),
                  CustomLogButton(
                    buttonText: 'Edit Profile',
                    buttonTextSpan: "aaa",
                    formKey: userProfileCtrl.editFormKey,
                    pageButton: () => userProfileCtrl.updateUserProfile(),
                    pageButtonTextSpan: 'pageButtonTextSpan',
                    textSpan: 'aaaaaa',
                    isbuttonTextSpan: false,
                  ),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}
