import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:get/get_core/get_core.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:hmfs/app/data/models/healthprofile.dart';
import 'package:hmfs/app/data/models/reservation.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../../core/utils/key.dart';

class HealthProfileWebServices {
  late Dio dio;

  HealthProfileWebServices() {
    BaseOptions options = BaseOptions(
      baseUrl: baseUrl,
      receiveDataWhenStatusError: true,
      // connectTimeout: 20 * 1000,
      // receiveTimeout: 20 * 1000,
    );
    dio = Dio(options);
  }

  Future<List<dynamic>> getListUserHealthProfiles(String token) async {
    try {
      Response response = await dio.get(
        '/api/get/user/list/health-profile',
        queryParameters: {
          "token": token,
        },
      );
      return response.data["data"];
    } on DioError catch (e) {
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'Unauthenticated User',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
        CacheHelper.deleteData(keyToken);
        Get.offNamed('/SignIn');
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
      return [];
    }
  }

  Future<HealthProfile?> getUserHealthProfile(
      String token, int healthProfileId) async {
    HealthProfile? healthProfile;
    try {
      Response response = await dio.get(
        '/api/get/user/health-profile',
        queryParameters: {
          "health_profile_id": healthProfileId,
          "token": token,
        },
      );
      healthProfile = HealthProfile.fromJson(response.data["data"]);
    } on DioError catch (e) {
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'Unauthenticated User',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
        CacheHelper.deleteData(keyToken);
        Get.offNamed('/SignIn');
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
    return healthProfile;
  }
}
