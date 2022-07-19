import 'package:shared_preferences/shared_preferences.dart';

class CacheHelper {
  static late SharedPreferences sharedPreferences;

  static init() async {
    sharedPreferences = await SharedPreferences.getInstance();
  }

  static Future<bool> putOnboardingData(String key, bool value) async {
    return await sharedPreferences.setBool(key, value);
  }

  static Future<bool> putTokenData(String key, String value) async {
    return await sharedPreferences.setString(key, value);
  }

  static bool getData(String key) {
    return sharedPreferences.getBool(key) ?? false;
  }

  static String getTokenData(String key) {
    return sharedPreferences.getString(key) ?? '';
  }

  static Future<bool> deleteData(String key) async {
    return await sharedPreferences.remove(key);
  }
}
