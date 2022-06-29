import 'package:flutter/material.dart';
import 'package:hmfs/app/widgets/custom_appbar.dart';

class ChatScreen extends StatelessWidget {
  const ChatScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: const [
        CustomAppBar(
          appBarColor: "#6574CF",
          title: "Profile",
          titleColor: "#FFFFFF",
          iconName1: "assets/images/Icon-alert.svg",
          iconSemantics1: 'Icon alert',
          colorIcon1: '#ffffff',
          iconName2: "assets/images/Icon-setting.svg",
          iconSemantics2: 'Icon-setting.svg',
          colorIcon2: '#ffffff',
          iconSize: 4.0,
          bottomPadding: 9.0,
        ),
      ],
    );
  }
}
