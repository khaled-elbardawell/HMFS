import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/reset_password/controller.dart';
import 'package:hmfs/app/widgets/custom_log_bottom.dart';
import 'package:hmfs/app/widgets/custom_log_header.dart';
import 'package:hmfs/app/widgets/custom_textfield.dart';

// Todo: Add singlechildscrollview to avoid overflow error
class ResetPasswordScreen extends StatelessWidget {
  ResetPasswordScreen({Key? key}) : super(key: key);
  final resetCtrl = Get.put(ResetPasswordController());
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Column(
        children: [
          const CustomLogHeader(
            title: 'Reset Password',
            subTitle:
                'Please enter your email address. A code will be sent to your email',
          ),
          Expanded(
            child: Padding(
              padding:
                  EdgeInsets.symmetric(horizontal: 6.5.wp, vertical: 8.0.wp),
              child: Form(
                key: resetCtrl.formKey,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  mainAxisSize: MainAxisSize.max,
                  crossAxisAlignment: CrossAxisAlignment.stretch,
                  children: [
                    CustomTextField(
                      controller: resetCtrl.emailController,
                      textInputType: TextInputType.emailAddress,
                      hintText: 'Email',
                      errorMessage:
                          'Caption text, description, error notification',
                      obscureText: false,
                      title: 'Email',
                      marginBottom: 3.0.hp,
                    ),
                    CustomLogButton(
                      formKey: resetCtrl.formKey,
                      buttonText: 'Continue',
                      // Todo: API call for reset password
                      pageButton: () => Get.offAllNamed('/home'),
                      textSpan: 'Did you remember the password? ',
                      buttonTextSpan: 'Sign In',
                      pageButtonTextSpan: '/SignIn',
                    ),
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
