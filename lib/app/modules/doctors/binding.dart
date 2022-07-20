import 'package:get/get.dart';
import 'package:hmfs/app/data/providers/doctor/provider.dart';
import 'package:hmfs/app/data/services/doctorapi/repository.dart';
import 'package:hmfs/app/modules/doctors/controller.dart';

class DoctorBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => DoctorsController(
        doctorRepository: DoctorRepository(
          doctorProvider: DoctorProvider(),
        ),
      ),
    );
  }
}
