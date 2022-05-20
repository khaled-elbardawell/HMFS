import 'package:flutter/material.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class MyThemeMode {
  static final lightTheme = ThemeData(
    colorScheme: const ColorScheme.light(),
    primaryColor: HexColor.fromHex('#6574CF'),
    appBarTheme: AppBarTheme(
      backgroundColor: HexColor.fromHex('#6574CF'),
      elevation: 0,
      titleTextStyle: TextStyle(
        fontSize: 13.5.sp,
        fontWeight: FontWeight.bold,
      ),
    ),
  );
}
