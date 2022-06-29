import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class CustomTextField extends StatelessWidget {
  final TextEditingController controller;
  final TextInputType textInputType;
  final String hintText;
  final String errorMessage;
  final bool obscureText;
  final String title;
  final double marginBottom;

  const CustomTextField({
    Key? key,
    required this.controller,
    required this.textInputType,
    required this.hintText,
    required this.errorMessage,
    required this.obscureText,
    required this.title,
    required this.marginBottom,
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
            color: HexColor.fromHex('#8992A3'),
          ),
        ),
        SizedBox(
          height: 0.2.hp,
        ),
        TextFormField(
          controller: controller,
          style: TextStyle(
            color: HexColor.fromHex('#222B45'),
          ),
          obscureText: obscureText,
          cursorColor: HexColor.fromHex('#8F9BB3'),
          keyboardType: textInputType,
          decoration: InputDecoration(
            fillColor: HexColor.fromHex('#F7F9FC'),
            filled: true,
            border: OutlineInputBorder(
              borderSide: BorderSide(
                color: HexColor.fromHex('#E4E9F2'),
                width: 2,
              ),
            ),
            hintText: hintText,
            hintStyle: TextStyle(
              color: HexColor.fromHex('#8F9BB3'),
            ),
          ),
          validator: (value) {
            if (value!.isEmpty) {
              return errorMessage;
            }
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
