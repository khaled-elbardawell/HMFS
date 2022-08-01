import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/data/models/message.dart';

class OwnMessageCard extends StatelessWidget {
  const OwnMessageCard({Key? key, required this.message}) : super(key: key);
  final Messages message;

  @override
  Widget build(BuildContext context) {
    return Align(
      alignment: Alignment.centerRight,
      child: ConstrainedBox(
        constraints: BoxConstraints(
          maxWidth: MediaQuery.of(context).size.width - 50,
        ),
        child: Card(
          elevation: 1,
          shape: const RoundedRectangleBorder(
            borderRadius: BorderRadius.only(
              bottomLeft: Radius.circular(10),
              topLeft: Radius.circular(10),
              topRight: Radius.circular(10),
            ),
          ),
          margin: const EdgeInsets.symmetric(
            horizontal: 15,
            vertical: 5,
          ),
          color: HexColor.fromHex(blue),
          child: Padding(
            padding: const EdgeInsets.all(4.0),
            child: Stack(
              children: [
                Padding(
                  padding: const EdgeInsets.only(
                    left: 10,
                    right: 50,
                    top: 5,
                    bottom: 20,
                  ),
                  child: Text(
                    message.message,
                    style: const TextStyle(color: Colors.white, fontSize: 18),
                  ),
                ),
                message.recipients[1].seenAt != null
                    ? const Positioned(
                        bottom: 4,
                        right: 10,
                        child: Icon(Icons.done_all_outlined,
                            color: Colors.white, size: 20),
                      )
                    : const SizedBox(),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
