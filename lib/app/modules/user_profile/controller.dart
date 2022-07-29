import 'dart:io';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/data/models/userprofile.dart';
import 'package:image_picker/image_picker.dart';
import '../../core/utils/key.dart';
import '../../data/services/storage/services.dart';
import '../../data/services/userprofile/repository.dart';

class UserProfileController extends GetxController {
  final editFormKey = GlobalKey<FormState>();
  final nameController = TextEditingController();
  final phoneController = TextEditingController();
  final bioController = TextEditingController();
  RxString typeImage = 'assets'.obs;
  dynamic image;
  RxString imageName = ''.obs;
  late UserProfile userProfile;
  RxBool requesting = false.obs;
  final UserProfileRepository userProfileRepository;

  UserProfileController({required this.userProfileRepository});

  void getUserProfile() {
    String token = CacheHelper.getTokenData(keyToken);
    userProfileRepository.getUserProfileData(token).then((value) {
      userProfile = value!;
      nameController.text = userProfile.data.name;
      phoneController.text = userProfile.data.phone;
      bioController.text = userProfile.data.bio;

      if (userProfile.data.upload != null) {
        imageName.value = userProfile.data.upload.file;
        typeImage.value = 'network';
      }
      requesting.value = true;
      if (kDebugMode) {
        print('Successful login! ' + userProfile.data.email);
      }
    });
  }

  void updateUserProfile() {
    String token = CacheHelper.getTokenData(keyToken);
    dynamic phone;
    dynamic bio;
    dynamic name;

    if (phoneController.text.isNotEmpty) {
      phone = phoneController.text;
    }
    if (bioController.text.isNotEmpty) {
      bio = bioController.text;
    }

    if (nameController.text.isNotEmpty) {
      name = nameController.text;
    } else {
      name = userProfile.data.name;
    }

    userProfileRepository
        .updateUserProfileData(token, name, phone, bio, image)
        .then((value) {
      requesting.value = false;
      getUserProfile();
    });
  }

  @override
  void onInit() {
    // getUserProfile();
    super.onInit();
    if (kDebugMode) {
      print("onInit print user");
    }
  }

  @override
  void onReady() {
    if (kDebugMode) {
      print("onReady print");
    }
    super.onReady();
  }

  @override
  void onClose() {
    if (kDebugMode) {
      print("onClose print");
    }
    super.onClose();
  }

  void logout() {
    CacheHelper.deleteData(keyToken).then(
      (value) {
        Get.snackbar(
          'Success',
          'Logout Success',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
        Get.offAllNamed('/SignIn');
      },
    );
  }

  Future pickImage() async {
    try {
      final image = await ImagePicker().pickImage(source: ImageSource.gallery);
      if (image == null) return;
      final imageTemp = File(image.path);
      this.image = imageTemp;
      imageName.value = imageTemp.path;
      typeImage.value = 'file';
    } on PlatformException catch (e) {
      if (kDebugMode) {
        print('Failed to pick image: $e');
      }
    }
  }
}
