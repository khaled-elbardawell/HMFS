import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/data/models/healthprofile.dart';
import 'package:hmfs/app/modules/health_profile/controller.dart';

class SingleCardHealthProfile extends StatelessWidget {
  const SingleCardHealthProfile(
      {Key? key, required this.healthProfiles, required this.healthProfileCtrl})
      : super(key: key);
  final HealthProfile healthProfiles;
  final HealthProfileController healthProfileCtrl;

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.symmetric(
        vertical: 4.7.wp,
        horizontal: 4.0.wp,
      ),
      margin: EdgeInsets.symmetric(
        vertical: 1.5.wp,
        // horizontal: 4.0.wp,
      ),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(5.0),
        boxShadow: [BoxShadow(color: Colors.grey[300]!, blurRadius: 1)],
      ),
      child: ListTile(
        onTap: () {
          healthProfileCtrl.getSingleHealthProfile(healthProfiles.id);
        },
        focusColor: HexColor.fromHex('#ffffff'),
        leading: ClipRRect(
          borderRadius: BorderRadius.circular(600.0),
          child: Image.asset(
            "assets/images/user-assets.png",
            fit: BoxFit.fill,
            width: 18.0.wp,
            height: 18.0.wp,
          ),
        ),
        title: Text(
          "${healthProfiles.title}",
          style: TextStyle(
            fontSize: 12.5.sp,
            color: HexColor.fromHex(darkBlue),
            fontWeight: FontWeight.bold,
          ),
        ),
        subtitle: Text(
          "Dr. ${healthProfiles.doctor.name}",
        ),
        trailing: Text(
          '${DateTime.parse(healthProfiles.createdAt).day}/${DateTime.parse(healthProfiles.createdAt).month}/${DateTime.parse(healthProfiles.createdAt).year}',
        ),
      ),
    );
  }
}
