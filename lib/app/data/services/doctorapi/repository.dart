import 'package:hmfs/app/data/models/doctor.dart';
import 'package:hmfs/app/data/providers/doctor/provider.dart';

class DoctorRepository {
  DoctorProvider doctorProvider;
  DoctorRepository({
    required this.doctorProvider,
  });

  Future<List<Doctor>> getUserDoctors(String token) async {
    return await doctorProvider.getUserDoctors(token);
  }

  Future<Doctor?> getUserDoctor(String token, String doctorId) async =>
      await doctorProvider.getUserDoctor(token, doctorId);
}
