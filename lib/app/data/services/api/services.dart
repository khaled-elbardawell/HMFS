import 'package:dio/dio.dart';
import 'package:flutter/material.dart';

import '../../../core/utils/key.dart';
import '../../models/user.dart';

class WebServices {
  late Dio dio;

  WebServices() {
    BaseOptions options = BaseOptions(
      baseUrl: baseUrl,
      receiveDataWhenStatusError: true,
      // connectTimeout: 20 * 1000,
      // receiveTimeout: 20 * 1000,
    );
    dio = Dio(options);
  }

  Future<User> loginUser(String email, String password) async {
    try {
      Response response = await dio.post(
        '/api/auth/login',
        data: {
          'email': email,
          'password': password,
        },
      );
      return User.fromJson(response.data);
    } on DioError catch (e) {
      debugPrint('Status code: ${e.response?.statusCode.toString()}');
      throw Exception("Failed to login user $email");
    }
  }
}
