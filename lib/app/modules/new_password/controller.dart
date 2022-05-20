import 'package:flutter/material.dart';
import 'package:get/state_manager.dart';

class NewPasswordController extends GetxController {
  final formKey = GlobalKey<FormState>();
  final passwordController = TextEditingController();
  final repeatPasswordController = TextEditingController();
}
