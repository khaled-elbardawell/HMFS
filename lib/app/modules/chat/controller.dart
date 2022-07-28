import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/user_chat.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../data/services/chat_services/repository.dart';

class ChatController extends GetxController {
  RxBool requesting = false.obs;
  RxBool isNotEmptyUsers = false.obs;
  List<UserChats> userChats = [];
  final ChatRepository chatRepository;

  ChatController({required this.chatRepository});

  void getUserChats() {
    String token = CacheHelper.getTokenData(keyToken);
    print('token get User Chats  is: $token');
    chatRepository.getUserChats(token).then((value) {
      userChats = value;
      if (userChats.isEmpty) {
        isNotEmptyUsers.value = false;
      } else {
        isNotEmptyUsers.value = true;
      }
      requesting.value = true;
    });
  }

  @override
  void onInit() {
    print('chats onInit controoler');
    getUserChats();
    super.onInit();
  }
}
