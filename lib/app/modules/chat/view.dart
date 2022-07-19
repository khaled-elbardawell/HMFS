import 'package:flutter/material.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/chat/widget/singleuserchatcard.dart';

import 'package:hmfs/app/widgets/custom_new_appbar.dart';

import '../../core/utils/extensions.dart';

class ChatScreen extends StatelessWidget {
  const ChatScreen({Key? key}) : super(key: key);

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
