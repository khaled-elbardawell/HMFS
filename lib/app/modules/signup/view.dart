import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/home.dart';
import 'package:hmfs/app/modules/signup/controller.dart';
import 'package:hmfs/app/widgets/custom_log_bottom.dart';
import 'package:hmfs/app/widgets/custom_log_header.dart';
import 'package:hmfs/app/widgets/custom_textfield.dart';

class SignUpScreen extends StatelessWidget {
  SignUpScreen({Key? key}) : super(key: key);
  final signUpCtrl = Get.put(SignUpController());

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
                      key: signUpCtrl.signUpformKey,
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          CustomTextField(
                            title: 'name',
                            controller: signUpCtrl.nameController,
                            textInputType: TextInputType.text,
                            hintText: 'Name',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: false,
                            marginBottom: 3.0.hp,
                          ),
                          CustomTextField(
                            title: 'email',
                            controller: signUpCtrl.emailController,
                            textInputType: TextInputType.emailAddress,
                            hintText: 'email',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: false,
                            marginBottom: 3.0.hp,
                          ),
                          CustomTextField(
                            title: 'Mobile Number',
                            controller: signUpCtrl.mobilephoneController,
                            textInputType: TextInputType.phone,
                            hintText: 'Mobile Number',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: false,
                            marginBottom: 3.0.hp,
                          ),
                          CustomTextField(
                            title: 'PassWord',
                            controller: signUpCtrl.passwordController,
                            textInputType: TextInputType.text,
                            hintText: 'Password',
                            errorMessage:
                                'Caption text, description, error notification',
                            obscureText: true,
                            marginBottom: 4.0.hp,
                          ),
                          CustomLogButton(
                            buttonText: 'Sign UP',
                            formKey: signUpCtrl.signUpformKey,
                            // Todo: API call to sign up
                            pageBotton: () => Get.offAllNamed('/home'),
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
