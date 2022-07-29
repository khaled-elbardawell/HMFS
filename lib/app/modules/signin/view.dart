import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/signin/controller.dart';
import 'package:hmfs/app/widgets/custom_log_bottom.dart';
import 'package:hmfs/app/widgets/custom_log_header.dart';
import 'package:hmfs/app/widgets/custom_textfield.dart';

class SignInScreen extends StatelessWidget {
  const SignInScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final signInCtrl = Get.find<SignInController>();
    return Scaffold(
      backgroundColor: Colors.white,
      body: Column(
        children: [
          const CustomLogHeader(
            title: 'Sign In',
            subTitle: 'Please enter your credentials to proceed',
          ),
          Expanded(
            child: SingleChildScrollView(
              child: Padding(
                padding:
                    EdgeInsets.symmetric(horizontal: 6.5.wp, vertical: 8.0.wp),
                child: Column(
                  children: [
                    Form(
                      key: signInCtrl.formKey,
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          CustomTextField(
                            controller: signInCtrl.emailController,
                            textInputType: TextInputType.emailAddress,
                            hintText: 'Email',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: false,
                            title: 'Email',
                            marginBottom: 3.0.hp,
                          ),
                          CustomTextField(
                            controller: signInCtrl.passwordController,
                            textInputType: TextInputType.text,
                            hintText: 'Password',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: true,
                            title: 'PassWord',
                            marginBottom: 1.5.hp,
                          ),
                          // Container(
                          //   alignment: Alignment.center,
                          //   child: TextButton(
                          //     style: const ButtonStyle(
                          //         splashFactory: NoSplash.splashFactory),
                          //     onPressed: () {
                          //       Get.toNamed('/ResetPassword');
                          //     },
                          //     child: Text(
                          //       'Forget Password?',
                          //       style: TextStyle(
                          //           fontSize: 11.0.sp,
                          //           color: HexColor.fromHex('#6574CF')),
                          //     ),
                          //   ),
                          // ),
                          SizedBox(
                            height: 4.0.hp,
                          ),
                          CustomLogButton(
                            formKey: signInCtrl.formKey,
                            buttonText: 'Sign in',
                            pageButton: () => signInCtrl.loginUser(),
                            textSpan: 'Don’t have an account?',
                            buttonTextSpan: 'Sign Up',
                            pageButtonTextSpan: '/SignUp',
                          ),
                        ],
                      ),
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
