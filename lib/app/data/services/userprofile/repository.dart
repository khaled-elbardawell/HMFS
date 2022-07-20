import 'dart:io';
import 'package:hmfs/app/data/models/userprofile.dart';
import 'package:hmfs/app/data/providers/userprofile/provider.dart';

class UserProfileRepository {
  UserProfileProvider userProfileProvider;
  UserProfileRepository({
    required this.userProfileProvider,
  });

  Future<UserProfile?> getUserProfileData(String token) async =>
      await userProfileProvider.getUserProfileData(token);

  Future<UserProfile?> updateUserProfileData(String token, String name,
          String phone, String bio, File image) async =>
      await userProfileProvider.updateUserProfileData(
          token, name, phone, bio, image);
}
