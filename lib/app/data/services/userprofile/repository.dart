import 'package:hmfs/app/data/models/userprofile.dart';
import 'package:hmfs/app/data/providers/userprofile/provider.dart';

class UserProfileRepository {
  UserProfileProvider userProfileProvider;
  UserProfileRepository({
    required this.userProfileProvider,
  });

  Future<UserProfile?> getUserProfileData(String token) async =>
      await userProfileProvider.getUserProfileData(token);

  Future<void> updateUserProfileData(String token, dynamic name, dynamic phone,
          dynamic bio, dynamic image) async =>
      await userProfileProvider.updateUserProfileData(
          token, name, phone, bio, image);
}
