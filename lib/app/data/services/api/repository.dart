import '/app/data/providers/user/provider.dart';

import '../../models/user.dart';

class UserRepository {
  UserProvider userProvider;
  UserRepository({
    required this.userProvider,
  });

  Future<User> loginUser(String email, String password) async =>
      await userProvider.loginUser(email, password);
}
