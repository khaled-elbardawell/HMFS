import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/user_chat.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

import '../../data/services/PusherWebSockets/pusher.dart';
import '../../data/services/chat_services/repository.dart';

class ChatController extends GetxController {
  RxBool requesting = false.obs;
  RxBool isNotEmptyUsers = false.obs;
  RxList<UserChats> userChats = <UserChats>[].obs;
  final ChatRepository chatRepository;

  PusherService pusherService = PusherService();
  ChatController({required this.chatRepository});

  void getUserChats() {
    String token = CacheHelper.getTokenData(keyToken);
    chatRepository.getUserChats(token).then((value) {
      userChats.value = value;
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
    // userChatNotifyEvent();
    getUserChats();
    super.onInit();
  }

  // void userChatNotifyEvent(int userId) {
  //   pusherService.pusher.subscribe("presence-user.$userId").bind(
  //     'UserChatNotifyEvent',
  //     (event) {
  //       getUserChats();
  //     },
  //   );
  // }
}
