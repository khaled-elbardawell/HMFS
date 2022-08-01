import 'package:get/get.dart';
import 'package:hmfs/app/data/providers/chat/provider.dart';
import 'package:hmfs/app/data/providers/doctor/provider.dart';
import 'package:hmfs/app/data/services/chat_services/repository.dart';
import 'package:hmfs/app/data/services/doctorapi/repository.dart';
import 'package:hmfs/app/modules/doctor_profile/controller.dart';

class DoctorProfileBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => DoctorProfileController(
        doctorRepository: DoctorRepository(
          doctorProvider: DoctorProvider(),
        ),
        chatRepository: ChatRepository(
          chatProvider: ChatProvider(),
        ),
      ),
    );
  }
}
