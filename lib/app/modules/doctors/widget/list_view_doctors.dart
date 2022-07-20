import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/modules/doctors/widget/single_list_doctor.dart';

import '../../../data/models/doctor.dart';

class ListViewDOctors extends StatelessWidget {
  final List<Doctor> doctors;
  const ListViewDOctors({Key? key, required this.doctors}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      physics: const BouncingScrollPhysics(),
      itemCount: doctors.length,
      itemBuilder: (context, index) {
        return InkWell(
          onTap: () {
            Get.toNamed(
              '/doctorProfile',
              parameters: {"doctorId": doctors[index].id.toString()},
            );
          },
          child: SingleListDoctor(
            doctor: doctors[index],
          ),
        );
      },
    );
  }
}
