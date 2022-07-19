import 'package:flutter/gestures.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';

class CustomLogButton extends StatelessWidget {
  final GlobalKey<FormState> formKey;
  final String buttonText;
  final Function pageButton;
  final String textSpan;
  final String buttonTextSpan;
  final String pageButtonTextSpan;
  final bool isbuttonTextSpan;
  const CustomLogButton({
    Key? key,
    required this.formKey,
    required this.buttonText,
    required this.pageButton,
    required this.textSpan,
    required this.buttonTextSpan,
    required this.pageButtonTextSpan,
    this.isbuttonTextSpan = true,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Container(
          width: double.infinity,
          decoration: BoxDecoration(
            color: HexColor.fromHex(blue),
            borderRadius: BorderRadius.circular(5.0),
          ),
          child: TextButton(
            style: const ButtonStyle(
              splashFactory: NoSplash.splashFactory,
            ),
            onPressed: () {
              if (formKey.currentState!.validate()) {
                pageButton();
              }
            },
            child: Text(
              buttonText.toUpperCase(),
              style: TextStyle(
                color: Colors.white,
                fontSize: 12.5.sp,
                fontWeight: FontWeight.bold,
              ),
            ),
          ),
        ),
        SizedBox(
          height: 2.5.hp,
        ),
        if (isbuttonTextSpan)
          Container(
            alignment: Alignment.center,
            child: RichText(
              text: TextSpan(
                children: [
                  TextSpan(
                    text: textSpan,
                    style: TextStyle(
                      color: HexColor.fromHex(lightBlue),
                      fontSize: 13.0.sp,
                    ),
                  ),
                  TextSpan(
                    text: buttonTextSpan,
                    style: TextStyle(
                      color: HexColor.fromHex(blue),
                      fontSize: 13.0.sp,
                    ),
                    recognizer: TapGestureRecognizer()
                      ..onTap = () {
                        Get.offNamed(pageButtonTextSpan);
                      },
                  ),
                ],
              ),
            ),
          ),
      ],
    );
  }
}
