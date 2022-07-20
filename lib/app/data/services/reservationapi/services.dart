import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:get/get_core/get_core.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:hmfs/app/data/models/reservation.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../../core/utils/key.dart';

class ReservationWebServices {
  late Dio dio;

  ReservationWebServices() {
    BaseOptions options = BaseOptions(
      baseUrl: baseUrl,
      receiveDataWhenStatusError: true,
      // connectTimeout: 20 * 1000,
      // receiveTimeout: 20 * 1000,
    );
    dio = Dio(options);
  }

  Future<List<dynamic>> getUserUpcomingReservations(String token) async {
    try {
      Response response = await dio.get(
        '/api/get/user/upcoming/reservations',
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

  Future<List<dynamic>> getUserPreviousReservations(String token) async {
    try {
      Response response = await dio.get(
        '/api/get/user/previous/reservations',
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

  Future<Reservation?> getUserReservation(
      String token, int reservationId) async {
    Reservation? reservation;
    try {
      Response response = await dio.get(
        '/api/get/user/reservation',
        queryParameters: {
          "reservation_id": reservationId,
          "token": token,
        },
      );

      reservation = Reservation.fromJson(response.data["data"]);
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
    return reservation;
  }
}
