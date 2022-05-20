import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/new_password/controller.dart';
import 'package:hmfs/app/modules/signin/view.dart';
import 'package:hmfs/app/widgets/custom_log_bottom.dart';
import 'package:hmfs/app/widgets/custom_log_header.dart';
import 'package:hmfs/app/widgets/custom_textfield.dart';

class NewPasswordScreen extends StatelessWidget {
  NewPasswordScreen({Key? key}) : super(key: key);

  final newPasswordCtrl = Get.put(NewPasswordController());

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Column(
        children: [
          const CustomLogHeader(
            title: 'New password',
            subTitle: 'Create a new password',
          ),
          Expanded(
            child: Padding(
              padding:
                  EdgeInsets.symmetric(horizontal: 6.5.wp, vertical: 8.0.wp),
              child: Form(
                key: newPasswordCtrl.formKey,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  mainAxisSize: MainAxisSize.max,
                  crossAxisAlignment: CrossAxisAlignment.stretch,
                  children: [
                    Column(
                      children: [
                        CustomTextField(
                          controller: newPasswordCtrl.passwordController,
                          textInputType: TextInputType.emailAddress,
                          hintText: 'Password',
                          erroMessage:
                              'Caption text, description, error notification',
                          obscureText: true,
                          title: 'New Password',
                          marginBottom: 3.0.hp,
                        ),
                        CustomTextField(
                          controller: newPasswordCtrl.repeatPasswordController,
                          textInputType: TextInputType.emailAddress,
                          hintText: 'Password',
                          erroMessage:
                              'Caption text, description, error notification',
                          obscureText: true,
                          title: 'Repeat Password',
                          marginBottom: 3.0.hp,
                        ),
                      ],
                    ),
                    CustomLogButton(
                      formKey: newPasswordCtrl.formKey,
                      buttonText: 'Continue',
                      pageBotton: SignInScreen(),
                      textSpan: 'Did you remember the password? ',
                      buttonTextSpan: 'Sign In',
                      pageButtonTextSpan: '/SignIn',
                      isbuttonTextSpan: false,
                    )
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
