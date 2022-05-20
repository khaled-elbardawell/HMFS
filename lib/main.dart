import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:hmfs/app/binding.dart';
import 'package:hmfs/app/core/style/style.dart';
import 'package:hmfs/app/data/services/storage/services.dart';
import 'package:hmfs/app/home.dart';
import 'package:hmfs/app/modules/doctor_profile/view.dart';
import 'package:hmfs/app/modules/doctor_review/view.dart';
import 'package:hmfs/app/modules/edite_account/view.dart';
import 'package:hmfs/app/modules/reset_password/view.dart';
import 'package:hmfs/app/modules/signin/view.dart';
import 'package:hmfs/app/modules/signup/view.dart';

void main() async {
  await GetStorage.init();
  await Get.putAsync(
    () => StorageServices().init(),
  );
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return GetMaterialApp(
      debugShowCheckedModeBanner: false,
      theme: MyThemeMode.lightTheme,
      title: 'HMFS',
      initialBinding: Binding(),
      home: SignInScreen(),
      initialRoute: '/',
      getPages: [
        GetPage(
          name: '/',
          page: () => Home(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/doctorProfile',
          page: () => DoctorProfileScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/doctorReview',
          page: () => DoctorReviewScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/editAccount',
          page: () => const EditAccountScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/SignIn',
          page: () => SignInScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/SignUp',
          page: () => SignUpScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/ResetPassword',
          page: () => ResetPasswordScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
      ],
    );
  }
}
