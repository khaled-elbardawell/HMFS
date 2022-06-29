import 'package:get/instance_manager.dart';
import 'package:hmfs/app/modules/chat/controller.dart';

class ChatBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => ChatController(),
    );
  }
}
