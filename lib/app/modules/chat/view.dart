import 'dart:async';
import 'package:flutter/material.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/chat/widget/singleuserchatcard.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';
import 'package:pusher_channels_flutter/pusher_channels_flutter.dart';
import '../../core/utils/extensions.dart';
import '../../core/utils/key.dart';
import '../../data/services/storage/services.dart';

class ChatScreen extends StatefulWidget {
  const ChatScreen({Key? key}) : super(key: key);

  @override
  State<ChatScreen> createState() => _ChatScreenState();
}

class _ChatScreenState extends State<ChatScreen> {
  PusherChannelsFlutter pusher = PusherChannelsFlutter.getInstance();
  String _log = 'output:\n';
  @override
  void initState() {
    setUpServices();
    super.initState();
  }

  void setUpServices() {}

  // void setUpServices() {
  //   String token = CacheHelper.getTokenData(keyToken);
  //   print('token pusher : $token');
  //   var options = PusherOptions(
  //     host: '10.0.2.2',
  //     port: 6001,
  //     cluster: 'mt1',
  //     auth: PusherAuth(
  //       'http://10.0.2.2:8000/api/broadcasting/auth',
  //       headers: {
  //         'Authorization': 'Bearer ' + token,
  //         'Content-Type': 'application/json',
  //         'Accept': 'application/json',
  //       },
  //     ),
  //   );

  //   LaravelFlutterPusher pusher = LaravelFlutterPusher(
  //     'pusherKey',
  //     options,
  //     enableLogging: false,
  //     onError: (error) {
  //       print("erorr message :" + error.message);
  //     },
  //     onConnectionStateChange: (status) {
  //       print("status : " + status.currentState);
  //     },
  //   );
  //   print("pusher : ${pusher.toString()}");
  //   pusher
  //       .subscribe('public')
  //       .bind('PublicEvent', (event) => print('event =>' + event.toString()));

  //   pusher.subscribe("private-websockets-dashboard-api-message").bind(
  //     'log-message',
  //     (event) {
  //       print('chat event =>qaaa');
  //       print('chat event =>' + event.toString());
  //     },
  //   );
  // }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: customAppBar("Chat", blue, white, Icons.search_outlined, () {}),
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          Expanded(
            child: ListView.builder(
              itemCount: 40,
              itemBuilder: (context, index) {
                return const SingleUserChatCard();
              },
            ),
          ),
        ],
      ),
    );
  }
}
