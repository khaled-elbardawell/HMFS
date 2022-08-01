import 'package:flutter/material.dart';
import 'package:hmfs/app/data/models/message.dart';

import '../../../core/utils/extensions.dart';
import '../../../core/values/colors.dart';

class ReplyMessageCard extends StatelessWidget {
  const ReplyMessageCard({Key? key, required this.message}) : super(key: key);
  final Messages message;

  @override
  Widget build(BuildContext context) {
    return Align(
      alignment: Alignment.centerLeft,
      child: ConstrainedBox(
        constraints: BoxConstraints(
          maxWidth: MediaQuery.of(context).size.width - 50,
        ),
        child: Card(
          elevation: 1,
          shape: const RoundedRectangleBorder(
            borderRadius: BorderRadius.only(
              topLeft: Radius.circular(10),
              topRight: Radius.circular(10),
              bottomRight: Radius.circular(10),
            ),
          ),
          margin: const EdgeInsets.symmetric(
            horizontal: 15,
            vertical: 5,
          ),
          color: HexColor.fromHex(grey),
          child: Padding(
            padding: const EdgeInsets.all(4.0),
            child: Stack(
              children: [
                Padding(
                  padding: const EdgeInsets.only(
                    left: 10,
                    right: 50,
                    top: 5,
                    bottom: 15,
                  ),
                  child: Text(
                    message.message,
                    style: TextStyle(
                        color: HexColor.fromHex(darkBlue), fontSize: 18),
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
