import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/modules/doctors/controller.dart';
import 'package:hmfs/app/modules/doctors/widget/grid_view_doctors.dart';
import 'package:hmfs/app/modules/doctors/widget/list_view_doctors.dart';
import 'package:hmfs/app/widgets/custom_appbar.dart';

class DoctorsScreen extends StatelessWidget {
  DoctorsScreen({Key? key}) : super(key: key);
  final doctorsCtrl = Get.put(DoctorsController());

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        const CustomAppBar(
          appBarColor: '#FFFFFF',
          title: "My Doctor",
          titleColor: '#222B45',
          iconName1: 'assets/images/Icon-search.svg',
          iconSemantics1: 'Search Icon',
          iconName2: 'assets/images/Icon-location.svg',
          iconSemantics2: 'Location Icon',
        ),
        Padding(
          padding: EdgeInsets.symmetric(vertical: 3.5.wp, horizontal: 6.5.wp),
          child: Row(
            children: [
              Text(
                "Doctor List",
                style: TextStyle(
                  color: HexColor.fromHex('#222B45'),
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
                          color: HexColor.fromHex('#8F9BB3'),
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
                            color: HexColor.fromHex('#8F9BB3'),
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
                  ? const GridViewDoctors()
                  : const ListViewDOctors(),
            ),
          ),
        ),
      ],
    );
  }
}
