// ignore_for_file: public_member_api_docs, sort_constructors_first
import '../../models/user.dart';
import '../../services/api/services.dart';

class UserProvider {
  final WebServices _webServices = WebServices();

  Future<User?> loginUser(String email, String password) async {
    final user = await _webServices.loginUser(email, password);
    return user;
  }

  Future<User?> registerUser(String email, String name, String password) async {
    final user = await _webServices.registerUser(email, name, password);
    return user;
  }

  Future<User?> meUser(String token) async {
    final user = await _webServices.meUser(token);
    return user;
  }
}
