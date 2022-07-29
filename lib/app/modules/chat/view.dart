import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/chat/controller.dart';
import 'package:hmfs/app/modules/chat/widget/singleuserchatcard.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';
import '../../core/utils/extensions.dart';
import '../../data/services/PusherWebSockets/pusher.dart';

class ChatScreen extends StatefulWidget {
  const ChatScreen({Key? key}) : super(key: key);

  @override
  State<ChatScreen> createState() => _ChatScreenState();
}

class _ChatScreenState extends State<ChatScreen> {
  // ChatController chatCtrl = Get.put(ChatController(
  //   chatRepository: ChatRepository(
  //     chatProvider: ChatProvider(),
  //   ),
  // ));
  ChatController chatCtrl = Get.find<ChatController>();

  @override
  void initState() {
    // setUpServices();
    super.initState();
  }

  void setUpServices() {
    // String token = CacheHelper.getTokenData(keyToken);

    // var options = PusherOptions(
    //   host: '10.0.2.2',
    //   port: 6001,
    //   cluster: 'mt1',
    //   auth: PusherAuth(
    //     'http://10.0.2.2:8000/broadcasting/auth',
    //     headers: {
    //       'Authorization': 'Bearer ' + token,
    //     },
    //   ),
    // );

    // LaravelFlutterPusher pusher = LaravelFlutterPusher(
    //   'pusherKey',
    //   options,
    //   enableLogging: true,
    //   onError: (error) {
    //     print("error message :" + error.message);
    //   },
    //   onConnectionStateChange: (status) {
    //     print("status : " + status.currentState);
    //   },
    // );

    PusherService pusherService = PusherService();

    pusherService.pusher.subscribe("presence-user.2").bind(
      'UserChatNotifyEvent',
      (event) {
        if (kDebugMode) {
          print('chat event =>' + event.toString());
        }
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: customAppBar("Chat", blue, white, Icons.search_outlined, () {}),
      body: Obx(
        () {
          if (chatCtrl.requesting.value) {
            if (chatCtrl.isNotEmptyUsers.value) {
              return Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.start,
                children: [
                  Expanded(
                    child: ListView.builder(
                      itemCount: chatCtrl.userChats.length,
                      itemBuilder: (context, index) {
                        return SingleUserChatCard(
                          image: chatCtrl.userChats[index].file,
                          lastMessage: chatCtrl.userChats[index].lastMessage,
                          name: chatCtrl.userChats[index].name,
                          updatedAt: chatCtrl.userChats[index].updatedAt,
                          userId: chatCtrl.userChats[index].userId,
                        );
                      },
                    ),
                  ),
                ],
              );
            } else {
              return const Center(
                child: Text('There is no chats'),
              );
            }
          } else {
            return Center(
              child: CircularProgressIndicator(
                color: HexColor.fromHex(blue),
              ),
            );
          }
        },
      ),
    );
  }
}
