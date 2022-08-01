import 'package:dio/dio.dart';
import 'package:flutter/foundation.dart';
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

  Future<ChatMessage?> getMessagesChat(String token, String chatId) async {
    ChatMessage? chatMessage;
    try {
      Response response = await dio.get(
        '/api/get/user/chat/messages',
        queryParameters: {
          "chat_id": chatId,
          "token": token,
        },
      );
      if (kDebugMode) {
        print('object :' + response.data['data'].toString());
      }
      chatMessage = ChatMessage.fromJson(response.data);
    } on DioError catch (e) {
      if (kDebugMode) {
        print('object :' + e.error.toString());
        print('stackTrace :' + e.stackTrace.toString());
      }

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
    return chatMessage;
  }

  Future<void> sendMessage(String token, String chatId, String message) async {
    try {
      await dio.post(
        '/api/user/chat/send',
        data: {
          "token": token,
          "chat_id": chatId,
          "message": message,
        },
      );
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
  }

  Future<void> seenMessage(String token, String chatId) async {
    try {
      await dio.post(
        '/api/user/chat/seen/messages',
        data: {
          "token": token,
          "chat_id": chatId,
        },
      );
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
  }

  Future<dynamic> createChat(String token, String userId) async {
    dynamic chatId = '';
    try {
      Response response = await dio.post(
        '/api/create/user/chat',
        data: {
          "token": token,
          "user_id": userId,
        },
      );
      chatId = response.data['chat_id'];
      return chatId;
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
      return chatId;
    }
  }
}
