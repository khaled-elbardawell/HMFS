import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:get/get_core/get_core.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:hmfs/app/data/models/message.dart';
import '../../../core/utils/key.dart';

class ChatWebServices {
  late Dio dio;

  ChatWebServices() {
    BaseOptions options = BaseOptions(
      baseUrl: baseUrl,
      receiveDataWhenStatusError: true,
    );
    dio = Dio(options);
  }

  Future<List<dynamic>> getUserChats(String token) async {
    try {
      Response response = await dio.get(
        '/api/get/user/chats',
        queryParameters: {
          "token": token,
        },
      );
      return response.data["data"];
    } on DioError catch (e) {
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'Invalid email or password',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
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
      return [];
    }
  }

  Future<Message?> getMessagesChat(String token, String chatId) async {
    Message? messages;
    try {
      Response response = await dio.get(
        '/api/get/user/chat/messages',
        queryParameters: {
          "token": token,
          "chat_id": chatId,
        },
      );
      messages = Message.fromJson(response.data);
    } on DioError catch (e) {
      if (e.response?.statusCode == 401) {
        Get.snackbar(
          'Error',
          'Invalid email or password',
          backgroundColor: Colors.white,
          colorText: Colors.black,
        );
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
    return messages;
  }
}
