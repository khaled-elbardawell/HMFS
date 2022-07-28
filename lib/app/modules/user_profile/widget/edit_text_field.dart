import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';

class EditTextField extends StatelessWidget {
  final TextEditingController controller;
  final TextInputType textInputType;
  final String hintText;
  final String errorMessage;
  final bool obscureText;
  final String title;
  final double marginBottom;
  final String initialValue;

  const EditTextField({
    Key? key,
    required this.controller,
    required this.textInputType,
    required this.hintText,
    required this.errorMessage,
    required this.obscureText,
    required this.title,
    required this.marginBottom,
    required this.initialValue,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(
          title.toUpperCase(),
          style: TextStyle(
            fontSize: 10.5.sp,
            fontWeight: FontWeight.bold,
            color: HexColor.fromHex(lightBlue),
          ),
        ),
        SizedBox(
          height: 0.2.hp,
        ),
        TextFormField(
          // initialValue: initialValue,
          controller: controller,
          style: TextStyle(
            color: HexColor.fromHex(darkBlue),
          ),
          obscureText: obscureText,
          cursorColor: HexColor.fromHex(lightBlue),
          keyboardType: textInputType,
          decoration: InputDecoration(
            fillColor: HexColor.fromHex(white),
            filled: true,
            border: OutlineInputBorder(
              borderSide: BorderSide(
                color: HexColor.fromHex(white),
                width: 2,
              ),
            ),
            hintText: hintText,
            hintStyle: TextStyle(
              color: HexColor.fromHex(lightBlue),
            ),
          ),
          validator: (value) {
            return null;
          },
        ),
        SizedBox(
          height: marginBottom,
        ),
      ],
    );
  }
}
