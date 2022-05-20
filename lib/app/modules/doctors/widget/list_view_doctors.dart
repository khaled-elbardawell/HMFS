import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/modules/doctors/widget/single_list_doctor.dart';

class ListViewDOctors extends StatelessWidget {
  const ListViewDOctors({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      physics: const BouncingScrollPhysics(),
      itemCount: 50,
      itemBuilder: (context, index) {
        return InkWell(
          onTap: () {
            Get.toNamed('/doctorProfile');
          },
          child: const SingleListDoctor(),
        );
      },
    );
  }
}
