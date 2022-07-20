import 'package:hmfs/app/data/models/reservation.dart';
import '../../services/reservationapi/services.dart';

class ReservationProvider {
  final ReservationWebServices _webServices = ReservationWebServices();

  Future<List<Reservation>> getUserUpcomingReservations(String token) async {
    final reservation = await _webServices.getUserUpcomingReservations(token);
    return reservation.map((e) => Reservation.fromJson(e)).toList();
  }

  Future<List<Reservation>> getUserPreviousReservations(String token) async {
    final reservation = await _webServices.getUserPreviousReservations(token);
    return reservation.map((e) => Reservation.fromJson(e)).toList();
  }

  Future<Reservation?> getUserReservation(
      String token, int reservationId) async {
    final reservation =
        await _webServices.getUserReservation(token, reservationId);
    return reservation;
  }
}
