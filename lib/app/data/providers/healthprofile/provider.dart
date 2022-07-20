import 'package:hmfs/app/data/models/healthprofile.dart';
import '../../services/healthprofile/services.dart';

class HealthProfileProvider {
  final HealthProfileWebServices _webServices = HealthProfileWebServices();

  Future<List<HealthProfile>> getListUserHealthProfiles(String token) async {
    final healthProfile = await _webServices.getListUserHealthProfiles(token);
    return healthProfile.map((e) => HealthProfile.fromJson(e)).toList();
  }

  Future<HealthProfile?> getUserHealthProfile(
      String token, int healthProfileId) async {
    final healthProfile =
        await _webServices.getUserHealthProfile(token, healthProfileId);
    return healthProfile;
  }
}
