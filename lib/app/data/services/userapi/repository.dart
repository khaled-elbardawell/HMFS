import '/app/data/providers/user/provider.dart';

import '../../models/user.dart';

class UserRepository {
  UserProvider userProvider;
  UserRepository({
    required this.userProvider,
  });

  Future<User?> loginUser(String email, String password) async =>
      await userProvider.loginUser(email, password);

  Future<User?> registerUser(
          String email, String name, String password) async =>
      await userProvider.registerUser(email, name, password);
  Future<User?> meUser(String token) async => await userProvider.meUser(token);
}
