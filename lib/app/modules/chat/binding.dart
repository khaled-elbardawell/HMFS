import 'package:get/instance_manager.dart';
import 'package:hmfs/app/data/providers/chat/provider.dart';
import 'package:hmfs/app/data/services/chat_services/repository.dart';
import 'package:hmfs/app/modules/chat/controller.dart';

class ChatBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => ChatController(
        chatRepository: ChatRepository(
          chatProvider: ChatProvider(),
        ),
      ),
    );
  }
}
