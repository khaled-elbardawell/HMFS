import 'dart:io';
import 'package:hmfs/app/data/models/userprofile.dart';
import '../../services/userprofile/services.dart';

class UserProfileProvider {
  final UserProfileWebServices _webServices = UserProfileWebServices();

  Future<UserProfile?> getUserProfileData(String token) async {
    final userProfile = await _webServices.getUserProfileData(token);
    return userProfile;
  }

  Future<UserProfile?> updateUserProfileData(
      String token, String name, String phone, String bio, File image) async {
    final userProfile = await _webServices.updateUserProfileData(
        token, name, phone, bio, image);
    return userProfile;
  }
}
