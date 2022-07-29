import 'package:dio/dio.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:get/get_core/get_core.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:hmfs/app/data/models/userprofile.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../../core/utils/key.dart';

class UserProfileWebServices {
  late Dio dio;

  UserProfileWebServices() {
    BaseOptions options = BaseOptions(
      baseUrl: baseUrl,
      receiveDataWhenStatusError: true,
      // connectTimeout: 20 * 1000,
      // receiveTimeout: 20 * 1000,
    );
    dio = Dio(options);
  }

  Future<UserProfile?> getUserProfileData(String token) async {
    UserProfile? userProfile;
    try {
      Response response = await dio.get(
        '/api/get/user/profile',
        queryParameters: {
          "token": token,
        },
      );
      userProfile = UserProfile.fromJson(response.data);
    } on DioError catch (e) {
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'Invalid email or password',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
        CacheHelper.deleteData(keyToken);
        Get.offNamed('/SignIn');
      } else if (e.response?.statusCode == 500) {
        Get.snackbar(
          'Error',
          'Check your internet connection',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
      } else {
        Get.snackbar(
          'Error',
          'Something is wrong',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
      }
    }
    return userProfile;
  }

  Future<void> updateUserProfileData(String token, dynamic name, dynamic phone,
      dynamic bio, dynamic image) async {
    late FormData data;
    if (kDebugMode) {
      print("image update : " + image.toString());
    }
    if (image != null) {
      String imageName = image.path.split('/').last;
      data = FormData.fromMap({
        "file": await MultipartFile.fromFile(
          image.path,
          filename: imageName,
        ),
      });
    }
    try {
      await dio.post(
        '/api/update/user/profile',
        data: {
          "token": token,
          "name": name,
          "phone": phone,
          "bio": bio,
          "image": image != null ? data : image,
        },
      );
      Get.snackbar(
        'Success',
        'Update your profile Success',
        backgroundColor: Colors.white,
        colorText: Colors.black,
      );
    } on DioError catch (e) {
      if (kDebugMode) {
        print("error :" + e.error.toString());
      }
      if (kDebugMode) {
        print("response :" + e.response.toString());
      }
      if (kDebugMode) {
        print("message :" + e.message.toString());
      }
      if (kDebugMode) {
        print("stackTrace :" + e.stackTrace.toString());
      }
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'The email has already been taken.',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
      } else if (e.response?.statusCode == 500) {
        Get.snackbar(
          'Error',
          'Check your Internet connection',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
      } else {
        Get.snackbar(
          'Error',
          'Something is wrong',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
      }
    }
  }
}
