import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/binding.dart';
import 'package:hmfs/app/core/style/style.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/services/storage/services.dart';
import 'package:hmfs/app/home.dart';
import 'package:hmfs/app/modules/doctor_profile/view.dart';
import 'package:hmfs/app/modules/doctor_review/view.dart';
import 'package:hmfs/app/modules/edit_account/view.dart';
import 'package:hmfs/app/modules/reservation/view.dart';
import 'package:hmfs/app/modules/reset_password/view.dart';
import 'package:hmfs/app/modules/signin/view.dart';
import 'package:hmfs/app/modules/signup/view.dart';
import 'app/modules/doctors/view.dart';
import 'app/modules/single_chat/view.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();

  await CacheHelper.init();
  bool isOnboarding = CacheHelper.getData(keyOnboarding);
  bool isLoggedIn = CacheHelper.getTokenData(keyToken) == '' ? false : true;

  runApp(MyApp(isOnboarding, isLoggedIn));
}

class MyApp extends StatelessWidget {
  final bool isOnboarding;
  final bool isLoggedIn;
  const MyApp(this.isOnboarding, this.isLoggedIn, {Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return GetMaterialApp(
      debugShowCheckedModeBanner: false,
      theme: MyThemeMode.lightTheme,
      title: 'HMFS',
      initialBinding: Binding(),
      // home: isOnboarding
      //     ? isLoggedIn
      //         ? const Home()
      //         : const SignInScreen()
      //     : OnboardingScreen(),
      // elbardawellkhaled@gmail.com
      home: const Home(),
      getPages: [
        GetPage(
          name: '/',
          page: () => const Home(),
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
          page: () => const SignInScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/SignUp',
          page: () => const SignUpScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/ResetPassword',
          page: () => ResetPasswordScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/Reservation',
          page: () => const ReservationScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/Doctors',
          page: () => const DoctorsScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
        GetPage(
          name: '/SingleChat',
          page: () => const SingleChatScreen(),
          transition: Transition.rightToLeftWithFade,
        ),
      ],
    );
  }
}
