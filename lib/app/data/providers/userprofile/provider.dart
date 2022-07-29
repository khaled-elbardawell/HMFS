import 'package:hmfs/app/data/models/userprofile.dart';
import '../../services/userprofile/services.dart';

class UserProfileProvider {
  final UserProfileWebServices _webServices = UserProfileWebServices();

  Future<UserProfile?> getUserProfileData(String token) async {
    final userProfile = await _webServices.getUserProfileData(token);
    return userProfile;
  }

  Future<void> updateUserProfileData(String token, dynamic name, dynamic phone,
      dynamic bio, dynamic image) async {
    await _webServices.updateUserProfileData(token, name, phone, bio, image);
  }
}
