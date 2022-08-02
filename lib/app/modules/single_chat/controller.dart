import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/message.dart';
import 'package:hmfs/app/data/services/PusherWebSockets/pusher.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../data/services/chat_services/repository.dart';

class SingleChatController extends GetxController {
  RxBool requesting = false.obs;
  RxBool isNotEmptyUsers = false.obs;
  late ChatMessage chatMessage;
  RxList<Messages> listMessage = <Messages>[].obs;
  RxList<Messages> myListMessage = <Messages>[].obs;
  final ChatRepository chatRepository;
  PusherService pusherService = PusherService();
  final formKey = GlobalKey<FormState>();
  final messageController = TextEditingController();
  ScrollController scrollController = ScrollController();

  String userId = Get.arguments['userId'];
  String chatId = Get.arguments['chatId'];
  SingleChatController({required this.chatRepository});

  @override
  void onInit() {
    print('userId :$userId , chatId: $chatId');
    userChatNotifyEvent(int.parse(userId));
    seenMessageEvent(int.parse(chatId));
    getMessagesChat();
    scrollDown();
    super.onInit();
  }

  void scrollDown() {
    scrollController.animateTo(
      scrollController.position.maxScrollExtent,
      duration: const Duration(milliseconds: 300),
      curve: Curves.easeOut,
    );
  }

  void getMessagesChat() {
    String token = CacheHelper.getTokenData(keyToken);
    if (kDebugMode) {
      print('user isd $userId');
    }
    chatRepository.getMessagesChat(token, chatId).then((value) {
      chatMessage = value!;
      listMessage.value = value.data.messages;

      seenMessageEvent(int.parse(chatId));
      scrollDown();
      if (kDebugMode) {
        print('Successful login! ' + value.toString());
      }
    });
  }

  void sendMessage() {
    String token = CacheHelper.getTokenData(keyToken);
    chatRepository
        .sendMessage(token, chatId, messageController.text)
        .then((value) {
      messageController.clear();
      sendMessageEvent(int.parse(chatId));
      userChatNotifyEvent(int.parse(userId));
      getMessagesChat();
    });
  }

  void seenMessage() {
    String token = CacheHelper.getTokenData(keyToken);
    chatRepository.seenMessage(token, chatId).then((value) {});
  }

  void userChatNotifyEvent(int userId) {
    pusherService.pusher.subscribe("presence-user.$userId").bind(
      'UserChatNotifyEvent',
      (event) {
        getMessagesChat();
        if (kDebugMode) {
          print('chat event =>' + event.toString());
        }
      },
    );
  }

  void sendMessageEvent(int chatId) {
    pusherService.pusher.subscribe('presence-chat.$chatId').bind(
      'SendMessageEvent',
      (event) {
        getMessagesChat();
      },
    );
  }

  void seenMessageEvent(int chatId) {
    pusherService.pusher.subscribe('chat.seen.$chatId').bind(
      'SeenMessageEvent',
      (event) {
        seenMessage();
      },
    );
  }
}
