import 'package:flutter/foundation.dart';
import 'package:hmfs/app/data/services/storage/services.dart';
import 'package:laravel_flutter_pusher/laravel_flutter_pusher.dart';

import '../../../core/utils/key.dart';

class PusherService {
  late LaravelFlutterPusher pusher;

  PusherService() {
    String token = CacheHelper.getTokenData(keyToken);
    var options = PusherOptions(
      host: '10.0.2.2',
      port: 6001,
      cluster: 'mt1',
      auth: PusherAuth(
        'http://10.0.2.2:8000/broadcasting/auth',
        headers: {
          'Authorization': 'Bearer ' + token,
        },
      ),
    );
    pusher = LaravelFlutterPusher(
      'pusherKey',
      options,
      enableLogging: true,
      onError: (error) {
        if (kDebugMode) {
          print("error message :" + error.message);
        }
      },
      onConnectionStateChange: (status) {
        if (kDebugMode) {
          print("status : " + status.currentState);
        }
      },
    );
  }
}
