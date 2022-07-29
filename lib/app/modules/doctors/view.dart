import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/modules/doctors/controller.dart';
import 'package:hmfs/app/modules/doctors/widget/grid_view_doctors.dart';
import 'package:hmfs/app/modules/doctors/widget/list_view_doctors.dart';
import 'package:hmfs/app/widgets/custom_new_appbar.dart';

class DoctorsScreen extends StatefulWidget {
  const DoctorsScreen({Key? key}) : super(key: key);

  @override
  State<DoctorsScreen> createState() => _DoctorsScreenState();
}

class _DoctorsScreenState extends State<DoctorsScreen> {
  DoctorsController doctorsCtrl = Get.find<DoctorsController>();

  @override
  void initState() {
    doctorsCtrl.requesting.value = false;
    doctorsCtrl.getUserDoctors();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: HexColor.fromHex(white),
        appBar:
            customAppBar("My Doctor", blue, white, Icons.search_rounded, () {}),
        body: Obx(() {
          if (doctorsCtrl.requesting.value) {
            return Column(
              children: [
                Padding(
                  padding: EdgeInsets.symmetric(
                      vertical: 3.5.wp, horizontal: 6.5.wp),
                  child: Row(
                    children: [
                      Text(
                        "Doctor List",
                        style: TextStyle(
                          color: HexColor.fromHex(darkBlue),
                          fontSize: 12.0.sp,
                          fontWeight: FontWeight.w500,
                        ),
                      ),
                      const Spacer(),
                      InkWell(
                        onTap: () {
                          doctorsCtrl.changeViewDoctorList();
                        },
                        child: Obx(() => Row(
                              children: [
                                Icon(
                                  doctorsCtrl.gridView.value
                                      ? Icons.view_list_sharp
                                      : Icons.grid_view_sharp,
                                  size: 5.0.wp,
                                  color: HexColor.fromHex(lightBlue),
                                ),
                                SizedBox(
                                  width: 1.0.wp,
                                ),
                                Text(
                                  doctorsCtrl.gridView.value
                                      ? "List View"
                                      : "Card View",
                                  style: TextStyle(
                                    fontSize: 9.5.sp,
                                    color: HexColor.fromHex(lightBlue),
                                  ),
                                ),
                              ],
                            )),
                      ),
                    ],
                  ),
                ),
                Expanded(
                  child: Obx(
                    () => Padding(
                        padding: EdgeInsets.symmetric(horizontal: 6.0.wp),
                        child: doctorsCtrl.gridView.value
                            ? GridViewDoctors(
                                doctors: doctorsCtrl.doctors,
                              )
                            : ListViewDOctors(
                                doctors: doctorsCtrl.doctors,
                              )),
                  ),
                ),
              ],
            );
          } else {
            return Center(
              child: CircularProgressIndicator(
                color: HexColor.fromHex(blue),
              ),
            );
          }
        }));
  }
}
