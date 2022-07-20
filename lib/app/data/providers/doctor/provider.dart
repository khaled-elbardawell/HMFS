import 'package:hmfs/app/data/services/doctorapi/services.dart';

import '../../models/doctor.dart';

class DoctorProvider {
  final DoctorWebServices _webServices = DoctorWebServices();

  Future<List<Doctor>> getUserDoctors(String token) async {
    final doctors = await _webServices.getUserDoctors(token);
    return doctors.map((e) => Doctor.fromJson(e)).toList();
  }

  Future<Doctor?> getUserDoctor(String token, String doctorId) async {
    final doctor = await _webServices.getUserDoctor(token, doctorId);
    return doctor;
  }
}
