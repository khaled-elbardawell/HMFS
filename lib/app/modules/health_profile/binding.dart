import 'package:get/get.dart';
import 'package:hmfs/app/data/providers/chat/provider.dart';
import 'package:hmfs/app/data/providers/healthprofile/provider.dart';
import 'package:hmfs/app/data/services/chat_services/repository.dart';
import 'package:hmfs/app/data/services/healthprofile/repository.dart';
import 'package:hmfs/app/modules/health_profile/controller.dart';

class SingleReservationBinding extends Bindings {
  @override
  void dependencies() {
    () => HealthProfileController(
          healthProfileRepository: HealthProfileRepository(
            healthProfileProvider: HealthProfileProvider(),
          ),
          chatRepository: ChatRepository(
            chatProvider: ChatProvider(),
          ),
        );
  }
}
