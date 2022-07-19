import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/single_chat/controller.dart';
import 'package:hmfs/app/modules/single_chat/widget/own_message_card.dart';
import 'package:hmfs/app/modules/single_chat/widget/reply_message_card.dart';

class SingleChatScreen extends GetView<SingleChatController> {
  const SingleChatScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor.fromHex(white),
      appBar: AppBar(
        iconTheme: IconThemeData(
          color: HexColor.fromHex(darkBlue),
        ),
        backgroundColor: Colors.white,
        centerTitle: true,
        title: Text(
          'Single Chat',
          style: TextStyle(
            color: HexColor.fromHex(darkBlue),
            fontSize: 18.0.sp,
          ),
        ),
      ),
      body: SizedBox(
        height: MediaQuery.of(context).size.height,
        width: MediaQuery.of(context).size.width,
        child: Stack(
          children: [
            Container(
              padding: const EdgeInsets.only(bottom: 20),
              height: MediaQuery.of(context).size.height - 160,
              child: ListView(
                shrinkWrap: true,
                children: const [
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                  ReplyMessageCard(),
                  OwnMessageCard(),
                ],
              ),
            ),
            Align(
              alignment: Alignment.bottomCenter,
              child: Container(
                padding: EdgeInsets.only(
                    top: 3.0.wp, right: 6.0.wp, left: 6.0.wp, bottom: 3.0.wp),
                color: Colors.white,
                child: Row(
                  children: [
                    SizedBox(
                      width: MediaQuery.of(context).size.width - 110,
                      child: TextFormField(
                        decoration: InputDecoration(
                          contentPadding: const EdgeInsets.symmetric(
                              vertical: 0, horizontal: 12),
                          border: OutlineInputBorder(
                            borderRadius: BorderRadius.circular(80.0),
                            gapPadding: 0.0,
                          ),
                          hintText: 'Type a message ...',
                        ),
                      ),
                    ),
                    const SizedBox(
                      width: 7.0,
                    ),
                    Container(
                      decoration: BoxDecoration(
                        shape: BoxShape.circle,
                        color: HexColor.fromHex(blue),
                      ),
                      child: IconButton(
                        splashRadius: 20,
                        color: Colors.white,
                        onPressed: () {},
                        icon: const Icon(
                          Icons.send_outlined,
                        ),
                      ),
                    )
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
