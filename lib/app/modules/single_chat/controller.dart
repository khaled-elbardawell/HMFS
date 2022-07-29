import 'package:flutter/foundation.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/message.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../data/services/chat_services/repository.dart';

class SingleChatController extends GetxController {
  RxBool requesting = false.obs;
  RxBool isNotEmptyUsers = false.obs;
  late ChatMessage chatMessage;
  List<Messages> listMessage = [];
  final ChatRepository chatRepository;
  SingleChatController({required this.chatRepository});

  void getMessagesChat() {
    String token = CacheHelper.getTokenData(keyToken);
    String userId = Get.arguments['chatId'];
    if (kDebugMode) {
      print('user isd $userId');
    }
    chatRepository.getMessagesChat(token, userId).then((value) {
      chatMessage = value!;
      listMessage = value.data.messages;
      if (kDebugMode) {
        print('Successful login! ' + value.toString());
      }
    });
  }

  @override
  void onInit() {
    getMessagesChat();
    super.onInit();
  }
}
