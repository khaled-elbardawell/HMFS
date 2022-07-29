import 'package:get/get.dart';
import 'package:hmfs/app/data/services/chat_services/repository.dart';
import 'package:hmfs/app/modules/single_chat/controller.dart';

import '../../data/providers/chat/provider.dart';

class SingleChatBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => SingleChatController(
        chatRepository: ChatRepository(
          chatProvider: ChatProvider(),
        ),
      ),
    );
  }
}
