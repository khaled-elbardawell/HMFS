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
  ChatController chatCtrl = Get.find<ChatController>();

  @override
  void initState() {
    chatCtrl.getUserChats();
    super.initState();
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
                          chatId: chatCtrl.userChats[index].chatId,
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
