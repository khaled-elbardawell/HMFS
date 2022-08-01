import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/healthprofile.dart';
import 'package:hmfs/app/data/services/chat_services/repository.dart';
import 'package:hmfs/app/data/services/healthprofile/repository.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

class HealthProfileController extends GetxController {
  final HealthProfileRepository healthProfileRepository;

  HealthProfileController(
      {required this.chatRepository, required this.healthProfileRepository});

  RxBool requesting = false.obs;
  List<HealthProfile> healthProfiles = [];
  late HealthProfile healthProfile;
  final ChatRepository chatRepository;
  @override
  void onInit() {
    getHealthProfiles();
    super.onInit();
  }

  void getHealthProfiles() {
    var token = CacheHelper.getTokenData(keyToken);
    healthProfileRepository.getListUserHealthProfiles(token).then((value) {
      healthProfiles = value;
      requesting.value = true;
    });
  }

  void getSingleHealthProfile(int healthProfileId) {
    var token = CacheHelper.getTokenData(keyToken);
    healthProfileRepository
        .getUserReservation(token, healthProfileId)
        .then((value) {
      healthProfile = value!;
      print("item upload : " + healthProfile.uploads.length.toString());
      Get.toNamed('/SingleHealthProfile');
    });
  }

  void createChat() {
    var token = CacheHelper.getTokenData(keyToken);
    chatRepository
        .createChat(token, healthProfile.doctor.id.toString())
        .then((value) {
      Get.toNamed('/SingleChat', arguments: {
        "userId": healthProfile.doctor.id.toString(),
        "chatId": value.toString(),
        "name": healthProfile.doctor.name,
      });
    });
  }
}
