import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:get/get_core/get_core.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:hmfs/app/data/models/doctor.dart';
import '../../../core/utils/key.dart';

class DoctorWebServices {
  late Dio dio;

  DoctorWebServices() {
    BaseOptions options = BaseOptions(
      baseUrl: baseUrl,
      receiveDataWhenStatusError: true,
      // connectTimeout: 20 * 1000,
      // receiveTimeout: 20 * 1000,
    );
    dio = Dio(options);
  }

  Future<List<dynamic>> getUserDoctors(String token) async {
    try {
      Response response = await dio.get(
        '/api/get/user/doctors',
        queryParameters: {
          "token": token,
        },
      );

      return response.data["doctors"];
    } on DioError catch (e) {
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'Unauthenticated User',
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
      return [];
    }
  }

  Future<Doctor?> getUserDoctor(String token, String doctorId) async {
    Doctor? doctor;
    try {
      Response response = await dio.get(
        '/api/get/user/doctor',
        queryParameters: {
          "doctor_id": doctorId,
          "token": token,
        },
      );

      doctor = Doctor.fromJson(response.data["doctor"]);
    } on DioError catch (e) {
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'Unauthenticated User',
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
    return doctor;
  }
}
