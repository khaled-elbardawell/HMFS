import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/signup/controller.dart';
import 'package:hmfs/app/widgets/custom_log_bottom.dart';
import 'package:hmfs/app/widgets/custom_log_header.dart';
import 'package:hmfs/app/widgets/custom_textfield.dart';

class SignUpScreen extends GetView<SignUpController> {
  const SignUpScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Column(
        children: [
          const CustomLogHeader(
            title: 'Sign Up',
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
                      key: controller.signUpformKey,
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          CustomTextField(
                            title: 'name',
                            controller: controller.nameController,
                            textInputType: TextInputType.text,
                            hintText: 'Name',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: false,
                            marginBottom: 3.0.hp,
                          ),
                          CustomTextField(
                            title: 'email',
                            controller: controller.emailController,
                            textInputType: TextInputType.emailAddress,
                            hintText: 'email',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: false,
                            marginBottom: 3.0.hp,
                          ),
                          CustomTextField(
                            title: 'PassWord',
                            controller: controller.passwordController,
                            textInputType: TextInputType.text,
                            hintText: 'Password',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: true,
                            marginBottom: 4.0.hp,
                          ),
                          CustomLogButton(
                            buttonText: 'Sign UP',
                            formKey: controller.signUpformKey,
                            // Todo: API call to sign up
                            pageButton: () => controller.registerUser(),
                            textSpan: 'Do you have an account?',
                            buttonTextSpan: 'Sign In',
                            pageButtonTextSpan: '/SignIn',
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
