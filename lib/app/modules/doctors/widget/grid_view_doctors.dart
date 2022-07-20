import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/data/models/doctor.dart';
import 'package:hmfs/app/modules/doctors/widget/single_grid_doctor.dart';

class GridViewDoctors extends StatelessWidget {
  final List<Doctor> doctors;
  const GridViewDoctors({Key? key, required this.doctors}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GridView.builder(
      physics: const BouncingScrollPhysics(),
      gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
        crossAxisCount: 2,
        mainAxisSpacing: 2.4.wp,
        crossAxisSpacing: 1.9.wp,
        childAspectRatio: .67,
      ),
      itemCount: doctors.length,
      itemBuilder: (context, index) {
        return InkWell(
            onTap: () {
              Get.toNamed(
                '/doctorProfile',
                parameters: {"doctorId": doctors[index].id.toString()},
              );
            },
            child: SingleGridDoctor(
              doctor: doctors[index],
            ));
      },
    );
  }
}
