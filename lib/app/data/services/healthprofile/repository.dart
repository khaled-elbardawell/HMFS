import 'package:hmfs/app/data/models/healthprofile.dart';
import 'package:hmfs/app/data/providers/healthprofile/provider.dart';

class HealthProfileRepository {
  HealthProfileProvider healthProfileProvider;
  HealthProfileRepository({
    required this.healthProfileProvider,
  });

  Future<List<HealthProfile>> getListUserHealthProfiles(String token) async {
    return await healthProfileProvider.getListUserHealthProfiles(token);
  }

  Future<HealthProfile?> getUserReservation(
          String token, int healthProfileId) async =>
      await healthProfileProvider.getUserHealthProfile(token, healthProfileId);
}
